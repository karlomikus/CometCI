<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $template_data = array(
		'title' => 'Team roster',
		'create_title' => 'Add post',
		'edit_title' => 'Edit post',
		'add_button' => 'Add post'
	);

	public function __construct() {
		parent::__construct();
		$this->load->model('roster_m');

		$this->breadcrumb->append_crumb($this->template_data['title'], '/admin/roster');
	}

	public function index() {
		$this->load->model('teams/teams_m');

		$this->template
			->set($this->template_data)
			->set('teams', $this->teams_m->get_all())
			->build('admin/main');
	}

	public function create() {

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->breadcrumb->append_crumb($this->template_data['create_title'], 'admin/posts/create');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Title', 'required');

		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
				'date' => date('Y-m-d H:i:s'),
				'teaser' => $this->input->post('teaser'),
				'author' => $this->currentUserID,
				'label' => 1
			);    

			$this->posts_m->insert($data);
			redirect('admin/posts');
		}
		else {
			$this->load->model('labels/labels_m');
			$this->template
				->set('labels', $this->labels_m->get_all())
				->set('title', $this->template_data['create_title'])
				->build('admin/form');
		}
	}

	public function edit($id = 0) {

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->form_validation->set_rules('name', 'Team name', 'required');
		$this->breadcrumb->append_crumb($this->template_data['edit_title'], 'admin/teams/edit');

		if ($this->form_validation->run() == TRUE) {

			if (!empty($_FILES['logo']['name'])) {
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '200';
				$config['max_height']    = '200';
				$config['file_name']     = $id;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('logo')) {
					$this->team = $this->teams_m->get($id);
					$filepath = $this->folder_path.$this->team->logo;
					unlink($filepath);
					$logo_data = $this->upload->data();
				}
				else {
					echo 'logo fail';
					//redirect('admin/teams');
				}
			}

			if (!empty($_FILES['banner']['name'])) {
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '1024';
				$config['max_height']    = '768';
				$config['file_name']     = $id.'_banner';

				$this->upload->initialize($config);

				if ($this->upload->do_upload('banner')) {
					$this->team = $this->teams_m->get($id);
					$filepath = $this->folder_path.$this->team->banner;
					unlink($filepath);
					$banner_data = $this->upload->data();
				}
				else {
					echo 'banner fail';
					//redirect('admin/teams');
				}
			}

			$games_post = $this->input->post('games');
			if(isset($games_post) && !empty($games_post)) {
				$games_picked = implode(',', $games_post);
			}
			else { $games_picked = 0; }
			
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'games' => $games_picked,
				'banner' => $banner_data['file_name'],
				'logo' => $logo_data['file_name'],
				'type' => $this->input->post('type'),
				'countryID' => $this->input->post('country')
			);    

			$this->teams_m->update($id, $data);
			redirect('admin/teams');
		}
		else {
			$this->load->model('countries/countries_m');
			$this->load->model('games/games_m');
			$this->template
				->set('title', $this->template_data['edit_title'])
				->set('data', $this->teams_m->as_array()->get($id))
				->set('countries', $this->countries_m->get_all())
				->set('games', $this->games_m->get_all())
				->build('admin/form');
		}
	}

	public function delete($id = 0) {
		$this->team = $this->teams_m->get($id);
		$filepath_logo = $this->folder_path.$this->team->logo;
		$filepath_banner = $this->folder_path.$this->team->banner;
		unlink($filepath_logo);
		unlink($filepath_banner);
		$this->teams_m->delete($id);
		redirect('admin/teams');
	}
}