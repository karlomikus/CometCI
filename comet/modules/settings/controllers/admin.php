<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function index()
	{
		$this->load->model('settings_m');
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->template
			->set('title', 'Site Settings')
			->build('admin/main');

	}

}