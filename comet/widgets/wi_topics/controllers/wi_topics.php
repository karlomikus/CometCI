<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_topics extends MX_Controller {

	public function index() {
		$this->load->model('forums/forums_m');

		return $this->template
			->set_layout(null)
			->set('topics', $this->forums_m->get_all_topics())
			->build('wi_topics/main.twig');
	}

}