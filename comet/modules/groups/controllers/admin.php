<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $template_data = array(
		'title' => 'Groups',
		'create_title' => 'Add group',
		'edit_title' => 'Edit group',
		'add_button' => 'Add group',
		'uri' => '/admin/groups'
	);

	public function __construct() {
		parent::__construct();
		$this->load->model('groups_m');

		$this->breadcrumb->append_crumb($this->template_data['title'], $this->template_data['uri']);
	}

	public function index() {

		$this->template
			->set($this->template_data)
			->set('groups', $this->groups_m->get_all())
			->build('admin/main');

	}

	public function create() {

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->breadcrumb->append_crumb($this->template_data['create_title'], $this->template_data['uri'].'/create');

		$this->form_validation->set_rules('name', 'Group name', 'required');
		$this->form_validation->set_rules('description', 'Group description', 'trim');

		if ($this->form_validation->run() == TRUE) {

			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description')
			);
			$this->groups_m->insert($data);

			redirect('admin/groups');
		}
		else {

			$this->template
			->set('title', $this->template_data['create_title'])
			->build('admin/form');
		}
	}

	public function edit($id = 0) {

		if ($id == 1 || $id == 2) die('Trying to edit base groups!');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->breadcrumb->append_crumb($this->template_data['edit_title'], $this->template_data['uri'].'/edit');

		$this->form_validation->set_rules('name', 'Group name', 'required');
		$this->form_validation->set_rules('description', 'Group description', 'trim');

		if ($this->form_validation->run() == TRUE) {

			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description')
			);
			$this->groups_m->update($id, $data);

			redirect('admin/groups');
		}
		else {

			$this->template
			->set('title', $this->template_data['edit_title'])
			->set('data', $this->groups_m->as_array()->get($id))
			->build('admin/form');
		}
	}

	public function delete($id = 0) {

		if ($id == 1 || $id == 2) die('Trying to delete base groups!');

		$this->groups_m->delete($id);
		redirect('admin/groups');
	}

}