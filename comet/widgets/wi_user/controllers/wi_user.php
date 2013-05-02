<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_user extends Frontend_Controller {

	public function index() {

		$logged_in = FALSE;
		if ($this->ion_auth->logged_in()) {
			$logged_in = TRUE;
		}

		echo $this->template
			->set('login_errors', $this->session->flashdata('login_error'))
			->set('logged_in', $logged_in)
			->load_view('../widgets/wi_user/views/main.twig');
	}

}