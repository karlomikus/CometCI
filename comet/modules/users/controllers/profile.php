<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Frontend_Controller {

	public function index($userID=1) {

		$page_user = $this->ion_auth->user($userID)->row();
		$option = false;
		if($this->ion_auth->logged_in() && $page_user->user_id == $this->user->user_id) $option = true;

		$this->template
			->set('data', $page_user)
			->set('option', $option)
			->build('profile.twig');
	}

	public function edit($id) {
		$this->load->helper('form');
		$this->parser->addFunction('form_open_multipart');
		$this->parser->addFunction('form_close');

		$this->template
			->set('data', $this->ion_auth->user($id)->row())
			->build('editprofile.twig');
	}
}