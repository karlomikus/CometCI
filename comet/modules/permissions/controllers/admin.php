<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function index() {
		$this->load->model('permissions_m');

		$this->template
			->set('title', 'Permissions')
			->set('permissions', $this->permissions_m->get_all())
			->build('admin/main');
	}

	public function create() {

		$this->load->helper('form');

		$this->template
			->set('title', 'Create permission')
			->set('modules', $this->modules)
			->build('admin/form');
	}

	public function save() {
		$this->load->model('permissions_m');

		$data = array(
			'name' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'allow' => serialize($this->input->post('allowed')),
			'deny' => serialize($this->input->post('denied'))
		);

		$this->permissions_m->insert($data);

		redirect('permissions/admin');
	}

}