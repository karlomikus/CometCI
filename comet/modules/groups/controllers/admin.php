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

		$this->form_validation->set_rules('name', 'Name', 'required|trim|htmlspecialchars|is_unique[groups.name]|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|htmlspecialchars|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description')
			);

			$this->groups_m->insert($data);
			redirect('admin/groups');
		}
		else
		{
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

		$this->form_validation->set_rules('name', 'Name', 'required|trim|htmlspecialchars|is_unique[groups.name]|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|htmlspecialchars|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description')
			);

			$this->groups_m->update($id, $data);
			redirect('admin/groups');
		}
		else
		{
			$this->template
			->set('title', 'Edit group')
			->set('data', $this->groups_m->as_array()->get($id))
			->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		// Dont delete admin, members and clan group, we kinda need them!
		if ($id == 1 || $id == 2 || $id == 3)
		{
			$this->session->set_flashdata('messages', 'Trying to delete base groups!');
			redirect('admin/groups');
		}
		$this->groups_m->delete($id);
		redirect('admin/groups');
	}

	public function permissions($id = 0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('access_m', 'access');

		if(!empty($_POST))
		{
			$rules = $this->input->post('rules');
			$this->access->insert_access_array($rules, $id);

			redirect('admin/groups');
		}
		else
		{
			$this->load->model('modules/modules_m');
			$groupName = $this->groups_m->get($id)->name;

			$dbData = $this->access->get_many_by('group_id', $id);
			$dataArray = array();

			foreach ($dbData as $key => $data)
			{
				$dataArray[$data->module_id] = array('public' => $data->public_rule, 'admin' => $data->admin_rule);
			}

			$this->template
				->set('title', 'Edit '.$groupName.' permissions')
				->set('modules', $this->modules_m->get_all())
				->set('data', $dataArray)
				->set('groupName', $groupName)
				->build('admin/form_modules');
		}
	}

}