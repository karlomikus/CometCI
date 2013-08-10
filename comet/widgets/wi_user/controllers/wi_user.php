<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_user extends MX_Controller {

	public function index()
	{
		$this->load->helper('form');

		$logged_in = FALSE;
		if ($this->ion_auth->logged_in()) $logged_in = TRUE;
		$is_admin = FALSE;
		if ($this->ion_auth->is_admin()) $is_admin = TRUE;

		return $this->template
			->set_layout(null)
			->set('login_alerts', $this->session->flashdata('login_alerts'))
			->set('logged_in', $logged_in)
			->set('is_admin', $is_admin)
			->set('form_open', form_open('users/login'))
			->build('wi_user/main.twig');
	}

}