<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('roster_m');
	}

	public function index()
	{
		$this->load->model('teams/teams_m');

		$this->template
			->set('teams', $this->teams_m->get_all())
			->build('admin/main');
	}

	public function adduser($id = 0)
	{
		$users = $this->input->post('users');
		$this->roster_m->add_to_roster($users, $id);
		
		redirect('admin/roster');
	}

}