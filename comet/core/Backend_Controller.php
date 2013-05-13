<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		//Set theme for backend
		// $this->assets->js('ckeditor/ck.js');
		// $this->assets->css('ckeditor/ck.js');
		// $assets['css'][] = $this->assets->css('bootstrap.min');
		// $assets['css'][] = $this->assets->css('font-awesome.min');
		$this->assets->_add_to_group('css', 'font-awesome.min');
		$this->assets->_add_to_group('css', 'font-awesome.min2');
		$this->assets->_add_to_group('css', 'font-awesome.min3');
		$this->assets->_add_to_group('js', 'font-awesome.js');
		$this->assets->_add_to_group('js', 'font-jq.min3');
		$this->assets->build();

		$this->template
			->set_partial('sidebar', 'admin/sidebar')
			->set_partial('head', 'admin/head')
			->enable_parser(FALSE)
			->set_layout('main', 'admin');

		$current_page = $this->uri->segment(1, '') . '/' . $this->uri->segment(2, 'index');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			if($current_page != 'admin/login') redirect('admin/login');
		}
	}
}