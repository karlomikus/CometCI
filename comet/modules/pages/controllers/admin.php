<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('labels_m');
	}

	public function index() {
		
		$this->template
			->set('title', 'Labels')
			->set('labels', $this->labels_m->get_all())
			->build('admin/main');
	}

	public function create() {

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

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
				->set('title', 'Create label')
				->build('admin/form');
		}
	}

	public function edit($id = 0) {

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->form_validation->set_rules('title', 'Title', 'required');

		if ($this->form_validation->run() == TRUE) {

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
			
			$data = array(
				'name' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'banner' => $file
			);

			$this->labels_m->update($id, $data);
			redirect('admin/labels');
		}
		else {
			$this->template
				->set('title', 'Edit label')
				->set('data', $this->labels_m->as_array()->get($id))
				->build('admin/form');
		}
	}

	public function delete($id = 0) {
		$this->label = $this->labels_m->get($id);
		$filepath_banner = $this->folder_path.$this->label->banner;
		unlink($filepath_banner);
		$this->labels_m->delete($id);
		redirect('admin/labels');
	}
}