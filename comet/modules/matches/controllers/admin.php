<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	//API: 60C93BF0B5507EB6A957E2A1D7F5EE84
	private $folder_path = './uploads/screenshots/';

	private $template_data = array(
		'title' => 'Matches',
		'create_title' => 'Add match',
		'edit_title' => 'Edit match',
		'add_button' => 'Add match',
		'layout_title' => 'Choose layout',
		'uri' => '/admin/matches'
	);

	public function __construct() {
		parent::__construct();
		$this->load->model('matches_m');

		$this->breadcrumb->append_crumb($this->template_data['title'], $this->template_data['uri']);
	}

	public function index() {
		$this->load->model('opponents/opponents_m');
		$this->load->model('games/games_m');

		$this->template
			->set($this->template_data)
			->set('matches', $this->matches_m->get_all())
			->build('admin/main');

	}

	public function create() {

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->breadcrumb->append_crumb($this->template_data['create_title'], $this->template_data['uri'].'/create');

		$this->form_validation->set_rules('report', 'Report', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required|callback__valid_time');

		if ($this->form_validation->run() == TRUE) {

			$next_id = $this->matches_m->get_next_id();
			$this->load->library('upload');

		    // Insert match data
			$date = $this->input->post('date') .' '.$this->input->post('time');
			$players = $this->input->post('team_players');
			if(!empty($players)) $team_players = implode(",", $players);
			else $team_players = NULL;

			$data = array(
				'team' => $this->input->post('team'),
				'opponent' => $this->input->post('opponent'),
				'date' => $date,
				'game' => $this->input->post('game'),
				'report' => $this->input->post('report'),
				'type' => $this->input->post('type'),
				'matchlink' => $this->input->post('matchlink'),
				'status' => $this->input->post('status'),
				'opponent-players' => $this->input->post('opplayers'),
				'team-players' => $team_players
			);

			$this->matches_m->insert($data);
			$match_id = $this->db->insert_id();

			// Insert scores
			$opponent_scores = $this->input->post('opponentscore');
			$team_scores = $this->input->post('teamscore');
			$limit = count($team_scores);
			$score_array = array();
			for($i = 0; $i < $limit; $i++) {
				$score_array[$i] = array(
					'match' => $match_id,
					'opponent' => $opponent_scores[$i],
					'team' => $team_scores[$i]
				);
			}
			$this->matches_m->insert_scores($score_array);

			// Insert files
			// Process multiple file upload
			$files = $_FILES;
			$cpt = count($_FILES['userfile']['name']);
			for($i = 0; $i < $cpt; $i++) {
				
				$_FILES['userfile']['name'] 	= $files['userfile']['name'][$i];
				$_FILES['userfile']['type']		= $files['userfile']['type'][$i];
				$_FILES['userfile']['tmp_name']	= $files['userfile']['tmp_name'][$i];
				$_FILES['userfile']['error']	= $files['userfile']['error'][$i];
				$_FILES['userfile']['size']		= $files['userfile']['size'][$i];    

				$this->upload->initialize($this->set_upload_options($i, $match_id));

				if($this->upload->do_upload()) {
					$file_data = $this->upload->data();
					$this->matches_m->insert_files($match_id, $file_data['file_name']);
				}
				else {
					$file_data = NULL;
					//echo $this->upload->display_errors();
				}
			}

			redirect('admin/matches');
		}
		else {
			$this->load->model('opponents/opponents_m');
			$this->load->model('teams/teams_m');
			$this->load->model('games/games_m');

			$this->template
				->set('title', $this->template_data['create_title'])
				->set('opponents', $this->opponents_m->get_all())
				->set('teams', $this->teams_m->get_all())
				->set('games', $this->games_m->get_all())
				->build('admin/form');
		}
	}

	public function edit($id = 0) {

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->breadcrumb->append_crumb($this->template_data['edit_title'], $this->template_data['uri'].'/edit');

		$this->form_validation->set_rules('report', 'Report', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required|callback__valid_time');

		if ($this->form_validation->run() == TRUE) {

			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description')
			);
			$this->groups_m->update($id, $data);

			redirect('admin/groups');
		}
		else {
			$this->load->model('opponents/opponents_m');
			$this->load->model('teams/teams_m');
			$this->load->model('games/games_m');

			$this->template
				->set('title', $this->template_data['edit_title'])
				->set('opponents', $this->opponents_m->get_all())
				->set('teams', $this->teams_m->get_all())
				->set('games', $this->games_m->get_all())
				->set('data', $this->matches_m->as_array()->get($id))
				->build('admin/form');
		}
	}

	public function delete($id = 0) {

		$this->matches_m->delete($id);
		redirect('admin/matches');
	}

	private function set_upload_options($i, $next){
		$config = array();
		$config['upload_path']   = $this->folder_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['max_width']     = '1920';
		$config['max_height']    = '1080';
		$config['file_name'] 	 = $next.'_'.($i+1).'_'.time(); // example: 17_4_1362611687.jpg

		return $config;
	}

	public function fetch_team_members() {
		if (!$this->input->is_ajax_request()) redirect('admin/matches'); // Wot u think u doin m8

		if($_POST && $_POST['id']) {
			$id = $_POST['id'];
			$this->load->model('teams/teams_m');
			$this->template
				->set_layout(NULL)
				->set('data', $this->teams_m->get_team_members($id))
				->build('admin/ajax_members');
		}
		else {}		
	}

	public function _valid_time($time) {
		if(preg_match("/^(20|21|22|23|[01]\d|\d)(([:.][0-5]\d){1,2})$/", $time)) return true;
		$this->form_validation->set_message('_valid_time', 'The %s field is not set to valid time');
		return false;
	}

}