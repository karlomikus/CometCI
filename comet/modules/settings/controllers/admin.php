<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $template_data = array(
		'title' => 'Site Settings',
		'create_title' => 'Add setting',
		'edit_title' => 'Edit setting',
		'add_button' => 'Add setting',
		'uri' => '/admin/settings'
	);

	public function __construct() {
		parent::__construct();
		$this->load->model('settings_m');

		$this->breadcrumb->append_crumb($this->template_data['title'], $this->template_data['uri']);
	}

	public function index() {

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->template
			->set($this->template_data)
			->set('opponents', $this->settings_m->get_all())
			->build('admin/main');

	}

	public function create() {

		

		$this->breadcrumb->append_crumb($this->template_data['create_title'], $this->template_data['uri'].'/create');

		$this->form_validation->set_rules('name', 'Opponent name', 'required');

		$config['upload_path']   = $this->folder_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['max_width']     = '200';
		$config['max_height']    = '200';

		if ($this->form_validation->run() == TRUE) {

			$next_id = $this->opponents_m->get_next_id();
			$config['file_name'] = $next_id;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('logo')) {
				$logo_data = $this->upload->data();
			}
			else {
				$logo_data = NULL;
			}

			$data = array(
				'name' => $this->input->post('name'),
				'info' => $this->input->post('description'),
				'gameID' => $this->input->post('game'),
				'logo' => $logo_data['file_name']
			);
			
			$this->opponents_m->insert($data);

			redirect('admin/opponents');
		}
		else {
			$this->load->model('games/games_m');
			$this->games_m->order_by('name');

			$this->template
				->set('title', $this->template_data['create_title'])
				->set('games', $this->games_m->get_all())
				->build('admin/form');
		}
	}

	public function edit($id = 0) {

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->breadcrumb->append_crumb($this->template_data['edit_title'], $this->template_data['uri'].'/edit');

		$this->form_validation->set_rules('name', 'Opponent name', 'required');

		$config['upload_path']   = $this->folder_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['max_width']     = '200';
		$config['max_height']    = '200';

		if ($this->form_validation->run() == TRUE) {

			$config['file_name'] = $id;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('logo')) {
				//Delete old image
				$this->opponent = $this->opponents_m->get($id);
				$filepath = $this->folder_path.$this->opponent->logo;
				unlink($filepath);
				$logo_data = $this->upload->data();
			}
			else {
				$logo_data = NULL;
			}

			$data = array(
				'name' => $this->input->post('name'),
				'info' => $this->input->post('description'),
				'gameID' => $this->input->post('game'),
				'logo' => $logo_data['file_name']
			);

			$this->opponents_m->update($id, $data);
			redirect('admin/opponents');
		}
		else {
			$this->load->model('games/games_m');
			$this->games_m->order_by('name');

			$this->template
			->set('title', $this->template_data['edit_title'])
			->set('games', $this->games_m->get_all())
			->set('data', $this->opponents_m->as_array()->get($id))
			->build('admin/form');
		}
	}

	public function delete($id = 0) {
		$this->opponent = $this->opponents_m->get($id);
		$filepath = $this->folder_path.$this->opponent->logo;
		unlink($filepath);
		$this->opponents_m->delete($id);
		redirect('admin/opponents');
	}

}