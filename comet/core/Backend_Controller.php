<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_Controller extends MY_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library();

		//Set theme for backend
		$this->template
			->set_partial('sidebar', 'admin/sidebar')
			->set_partial('module_header', 'admin/module_header')
			->enable_parser(FALSE)
			->set_layout('main', 'admin');

		$this->breadcrumb->append_crumb('Home', '/admin/dashboard');

		$current_page = $this->uri->segment(1, '') . '/' . $this->uri->segment(2, 'index');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			if($current_page != 'admin/login') redirect('admin/login');
		}
	}
}