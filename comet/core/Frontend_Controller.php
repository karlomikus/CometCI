<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_Controller extends MY_Controller {
	public function __construct() {

		parent::__construct();

		$this->template
			->set_theme('default')
			->set_layout('frontend');
	}
}