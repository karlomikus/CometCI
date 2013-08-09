<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/screenshots/';
	private $perPage = 15;

	public function __construct()
	{
		parent::__construct();

		// Add missing javascript
		$this->template->append_metadata(Assets::adminJs('ckeditor', 'js/ckeditor'));
		$this->template->append_metadata(Assets::adminJs('picker', 'js/pickdate'));
		$this->template->append_metadata(Assets::adminJs('picker.time', 'js/pickdate'));
		$this->template->append_metadata(Assets::adminJs('picker.date', 'js/pickdate'));
		$this->template->append_metadata(Assets::adminJs('legacy', 'js/pickdate'));

		$this->load->model('matches_m');
	}

	public function index($sortBy = 'date', $sortOrder = 'desc', $page = 0)
	{
		$this->load->model('opponents/opponents_m');
		$this->load->model('games/games_m');
		$this->load->library('pagination');

		$count = $this->matches_m->count_all();

		if(isset($sortBy) && isset($sortOrder)) $this->matches_m->order_by($sortBy, $sortOrder);
		else $this->matches_m->order_by('date', 'desc');

		$config = $this->config->item('pagination_backend');
		$config['base_url'] = base_url()."admin/matches/index/$sortBy/$sortOrder/";
		$config['total_rows'] = $count;
		$config['per_page'] = $this->perPage;
		$config['uri_segment'] = 6;

		$this->pagination->initialize($config);
		$this->matches_m->limit($this->perPage, $page);

		$matches = $this->matches_m->get_matches(false);
		$upcomingMatches = $this->matches_m->get_upcoming_matches();

		$linkData = new stdClass();
		$linkData->page = $page;
		$linkData->sortOrderLink = ($sortOrder == 'asc') ? 'desc' : 'asc';
		$linkData->currentOrder = $sortBy;

		$this->template
			->set('title', 'Matches')
			->set('matches', $matches)
			->set('upcoming', $upcomingMatches)
			->set('linkdata', $linkData)
			->set('pagination', $this->pagination->create_links())
			->build('admin/main');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->helper('htmlpurifier');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->form_validation->set_rules('opponent', 'Opponent', 'required');
		$this->form_validation->set_rules('team', 'Team', 'required');
		$this->form_validation->set_rules('game', 'Game', 'required');
		$this->form_validation->set_rules('report', 'Report', 'required|min_length[4]');
		$this->form_validation->set_rules('date', 'Date', 'required|htmlspecialchars|trim|xss_clean');
		$this->form_validation->set_rules('time', 'Time', 'required|htmlspecialchars|trim|xss_clean');

		$this->form_validation->set_rules('matchlink', 'Match link', 'prep_url|htmlspecialchars|trim|xss_clean');
		$this->form_validation->set_rules('opponentscore', 'Opponent scores', 'xss_clean');
		$this->form_validation->set_rules('teamscore', 'Team scores', 'xss_clean');
		$this->form_validation->set_rules('opplayers', 'Opponent player list', 'trim|htmlspecialchars|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
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
				'report' => html_purify($this->input->post('report'), 'wysiwyg'),
				'type' => $this->input->post('type'),
				'matchlink' => $this->input->post('matchlink'),
				'status' => $this->input->post('status'),
				'opponent-players' => $this->input->post('opplayers'),
				'team-players' => $team_players,
				'event' => $this->input->post('event')
			);

			$this->matches_m->insert($data);
			$match_id = $this->db->insert_id();

			// Insert scores
			$opponent_scores = $this->input->post('opponentscore', TRUE);
			$team_scores = $this->input->post('teamscore', TRUE);
			$limit = count($team_scores);
			$score_array = array();
			for($i = 0; $i < $limit; $i++)
			{
				$score_array[$i] = array(
					'match' => $match_id,
					'opponent' => intval($opponent_scores[$i]),
					'team' => intval($team_scores[$i])
				);
			}
			$this->matches_m->insert_scores($score_array);

			// Insert files
			// Process multiple file upload
			$files = $_FILES;
			$cpt = count($_FILES['userfile']['name']);
			if(!empty($_FILES['userfile']['size'][0]))
			{
				for($i = 0; $i < $cpt; $i++)
				{
					$_FILES['userfile']['name'] 	= $files['userfile']['name'][$i];
					$_FILES['userfile']['type']		= $files['userfile']['type'][$i];
					$_FILES['userfile']['tmp_name']	= $files['userfile']['tmp_name'][$i];
					$_FILES['userfile']['error']	= $files['userfile']['error'][$i];
					$_FILES['userfile']['size']		= $files['userfile']['size'][$i];
					$this->upload->initialize($this->set_upload_options($i, $match_id));

					if ($this->upload->do_upload('userfile'))
					{
						$file_data = $this->upload->data();
						$this->matches_m->insert_files($match_id, $file_data['file_name']);
					}
					else
					{
						$this->session->set_flashdata('create_error', $_FILES['userfile']['name'].': '.$this->upload->display_errors('', ''));
	                	$file_data = NULL;
					}
				}
			}

			redirect('admin/matches');
		}
		else
		{
			$this->load->model('opponents/opponents_m');
			$this->load->model('teams/teams_m');
			$this->load->model('games/games_m');
			$this->load->model('events/events_m');

			$this->template
				->set('title', 'Create Match')
				->set('opponents', $this->opponents_m->get_all())
				->set('teams', $this->teams_m->get_all())
				->set('games', $this->games_m->get_all())
				->set('events', $this->events_m->get_all())
				->build('admin/form');
		}
	}

	public function edit($id = 0)
	{
		$this->load->helper('form');
		$this->load->helper('htmlpurifier');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->form_validation->set_rules('opponent', 'Opponent', 'required');
		$this->form_validation->set_rules('team', 'Team', 'required');
		$this->form_validation->set_rules('game', 'Game', 'required');
		$this->form_validation->set_rules('report', 'Report', 'required|min_length[4]');
		$this->form_validation->set_rules('date', 'Date', 'required|htmlspecialchars|trim|xss_clean');
		$this->form_validation->set_rules('time', 'Time', 'required|htmlspecialchars|trim|xss_clean');

		$this->form_validation->set_rules('matchlink', 'Match link', 'prep_url|htmlspecialchars|trim|xss_clean');
		$this->form_validation->set_rules('opponentscore', 'Opponent scores', 'xss_clean');
		$this->form_validation->set_rules('teamscore', 'Team scores', 'xss_clean');
		$this->form_validation->set_rules('opplayers', 'Opponent player list', 'trim|htmlspecialchars|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			// Prep data
			$date = $this->input->post('date') .' '.$this->input->post('time');

			$players = $this->input->post('team_players');
			if(!empty($players)) $team_players = implode(",", $players);
			else $team_players = NULL;

			$data = array(
				'team' => $this->input->post('team'),
				'opponent' => $this->input->post('opponent'),
				'date' => $date,
				'game' => $this->input->post('game'),
				'report' => html_purify($this->input->post('report'), 'wysiwyg'),
				'type' => $this->input->post('type'),
				'matchlink' => $this->input->post('matchlink'),
				'status' => $this->input->post('status'),
				'opponent-players' => $this->input->post('opplayers'),
				'team-players' => $team_players
			);
			$this->matches_m->update($id, $data);

			// Update scores
			$opponent_scores = $this->input->post('opponentscore', TRUE);
			$team_scores = $this->input->post('teamscore', TRUE);
			print_r($team_scores);
			$limit = count($team_scores);
			$score_array = array();
			for($i = 0; $i < $limit; $i++) {
				$score_array[$i] = array(
					'match' => $id,
					'opponent' => intval($opponent_scores[$i]),
					'team' => intval($team_scores[$i])
				);
			}
			$this->matches_m->update_scores($id, $score_array);

			// Delete screenshots
			$selectedScreenshots = $this->input->post('todelete');
			foreach ($selectedScreenshots as $screenShot)
			{
				// Found doomed screenshot
				if(strpos($screenShot, 'delete ') !== FALSE)
				{
					$meta = explode(' ', $screenShot); // Get filename
					$this->matches_m->delete_screenshot($meta[1]); // Finally delete the screenshot file
				}
			}

			// Update new screenshots
			if(!empty($_FILES['userfile']['name'][0]))
			{
				// Insert files
				// Process multiple file upload
				$files = $_FILES;
				$cpt = count($_FILES['userfile']['name']);
				for($i = 0; $i < $cpt; $i++)
				{
					$_FILES['userfile']['name'] 	= $files['userfile']['name'][$i];
					$_FILES['userfile']['type']		= $files['userfile']['type'][$i];
					$_FILES['userfile']['tmp_name']	= $files['userfile']['tmp_name'][$i];
					$_FILES['userfile']['error']	= $files['userfile']['error'][$i];
					$_FILES['userfile']['size']		= $files['userfile']['size'][$i];
					$this->upload->initialize($this->set_upload_options($i, $id));

					if ($this->upload->do_upload('userfile'))
					{
						$file_data = $this->upload->data();
						$this->matches_m->insert_files($id, $file_data['file_name']);
					}
					else
					{
						$this->session->set_flashdata('create_error', $_FILES['userfile']['name'].': '.$this->upload->display_errors('', ''));
						$file_data = NULL;
					}
				}
			}

			redirect('admin/matches');
		}
		else
		{
			$this->load->model('opponents/opponents_m');
			$this->load->model('teams/teams_m');
			$this->load->model('games/games_m');
			$this->load->model('events/events_m');

			$this->template
				->set('title', 'Edit Match')
				->set('opponents', $this->opponents_m->get_all())
				->set('teams', $this->teams_m->get_all())
				->set('games', $this->games_m->get_all())
				->set('data', $this->matches_m->as_array()->get($id))
				->set('scores', $this->matches_m->get_scores($id))
				->set('screenshots', $this->matches_m->get_match_screenshots($id))
				->set('events', $this->events_m->get_all())
				->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		$this->matches_m->delete($id);
		$this->matches_m->delete_files($id);
		$this->matches_m->delete_scores($id);
		
		redirect('admin/matches');
	}

	private function set_upload_options($i, $next)
	{
		$config = array();
		$config['upload_path']   = $this->folder_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['max_width']     = '1920';
		$config['max_height']    = '1080';
		$config['file_name'] 	 = $next.'_'.($i+1).'_'.time(); // example: 17_4_1362611687.jpg

		return $config;
	}

	/**
	 * Gets all members in team and returns JSON array of
	 * their user ID's
	 * 	
	 * @return void
	 */
	public function fetch_team_members()
	{
		if (!$this->input->is_ajax_request()) redirect('admin/matches'); // Wot u think u doin m8
		$this->load->model('teams/teams_m');

		if(isset($_POST) && isset($_POST['id']))
		{
			$id 		= $this->input->post('id', TRUE);
			$teamData 	= $this->teams_m->get_team_members($id);
			$result 	= array();

			foreach ($teamData as $member)
			{
				$result[] = array(
					'id' => $member['user_id'],
					'text' => $this->ion_auth->user($member['user_id'])->row()->username
				);
			}
			echo json_encode($result);
		}
		else
		{
			redirect('admin/matches');
		}
	}

}