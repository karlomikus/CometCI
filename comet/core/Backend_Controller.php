<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		// Set default javascript
		$this->template->append_metadata(Assets::adminJs('main', 'js'));

		// Show login page
		$current_page = $this->uri->segment(1, '') . '/' . $this->uri->segment(2, 'index');
		if (!$this->ion_auth->logged_in())
		{
			if($current_page != 'admin/login') redirect('admin/login');
		}

		//Set theme for backend
		$this->template
			->set_partial('sidebar', 'admin/sidebar')
			->set_partial('head', 'admin/head')
			->enable_parser(FALSE)
			->set_layout('main', 'admin');

		// Check access
		$currentModule = $this->router->fetch_module();
		$accessGranted = $this->ion_auth->check_access(get_module_id($currentModule), 'admin');

		if($this->ion_auth->logged_in() && !$accessGranted)
		{
			// Allow access to dashboard
			$this->session->set_flashdata('access_error', 'You don\'t have access to this module!');
			if($current_page != 'admin/index') redirect('admin');
		}
	}
}