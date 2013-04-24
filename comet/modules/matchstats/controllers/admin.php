<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $template_data = array(
		'title' => 'Labels',
		'create_title' => 'Add label',
		'edit_title' => 'Edit label',
		'add_button' => 'Add label'
	);

	public function __construct() {
		parent::__construct();
		//$this->load->model('labels_m');

		$this->breadcrumb->append_crumb($this->template_data['title'], '/admin/labels');
	}

	public function index() {
		
		$this->template
			->set($this->template_data)
			->build('admin/main');
	}

	public function create() {

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->breadcrumb->append_crumb($this->template_data['create_title'], 'admin/labels/create');

		$this->form_validation->set_rules('title', 'Title', 'required');

		if ($this->form_validation->run() == TRUE) {

			$next_id = $this->labels_m->get_next_id();

			if (!empty($_FILES['banner']['name'])) {
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '600';
				$config['max_height']    = '200';
				$config['file_name']     = $next_id;
				$this->upload->initialize($config);

				if ($this->upload->do_upload('banner')) {
					$file_data = $this->upload->data();
				}
				else {
					echo 'file fail';
					//redirect('admin/teams');
				}
			}

			if(isset($file_data) and !empty($file_data['file_name'])) $file = $file_data['file_name'];
			else $file = '0';

			$data = array(
				'name' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'banner' => $file
			);

			$this->labels_m->insert($data);
			redirect('admin/labels');
		}
		else {

			$this->template
				->set('title', $this->template_data['create_title'])
				->build('admin/form');
		}
	}

	public function edit($id = 0) {

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->breadcrumb->append_crumb($this->template_data['edit_title'], 'admin/labels/edit');

		$this->form_validation->set_rules('title', 'Title', 'required');

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
			
			$data = array(
				'name' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'banner' => $file
			);

			$this->labels_m->update($id, $data);
			redirect('admin/labels');
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