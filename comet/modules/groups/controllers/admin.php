<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('groups_m');
	}

	public function index() 
	{
		$this->template
			->set('title', 'User groups')
			->set('groups', $this->groups_m->get_all())
			->build('admin/main');
	}

	public function create() 
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

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
			->set('title', 'Create group')
			->build('admin/form');
		}
	}

	public function edit($id = 0) 
	{
		if ($id == 1 || $id == 2) die('Trying to edit base groups!');

		$this->load->helper('form');
		$this->load->library('form_validation');

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
			->set('title', 'Edit group')
			->set('data', $this->groups_m->as_array()->get($id))
			->build('admin/form');
		}
	}

	public function delete($id = 0) {

		if ($id == 1 || $id == 2) die('Trying to delete base groups!');

		$this->groups_m->delete($id);
		redirect('admin/groups');
	}

	public function permissions($id = 0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('permissions_m', 'access');

		$this->form_validation->set_rules('module', 'Modules', 'required');

		if($this->form_validation->run())
		{
			$editedModules = $this->input->post('module');

			foreach ($editedModules as $module)
			{
				$data = array(
					'module' => $module,
					'group' => $id,
					'allow' => '1'
				);

				$this->access->insert($data);
			}
			redirect('admin/groups');
		}
		else
		{
			$this->load->model('modules/modules_m');

			$this->template
				->set('title', 'Edit group permissions')
				->set('modules', $this->modules_m->get_all())
				->build('admin/form_modules');
		}
	}

}