<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_user extends Frontend_Controller {

	public function index() {
		$this->load->helper('form');

		$logged_in = FALSE;
		if ($this->ion_auth->logged_in()) $logged_in = TRUE;
		$is_admin = FALSE;
		if ($this->ion_auth->is_admin()) $is_admin = TRUE;

		echo $this->template
			->set('login_alerts', $this->session->flashdata('login_alerts'))
			->set('logged_in', $logged_in)
			->set('is_admin', $is_admin)
			->set('form_open', form_open('users/login', array('class' => 'pure-form')))
			->load_view('../widgets/wi_user/views/main.twig');
	}

}