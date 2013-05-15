<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_topics extends Frontend_Controller {

	public function index() {
		$this->load->model('forums/forums_m');

		echo $this->template
			->set('topics', $this->forums_m->get_all_topics())
			->load_view('../widgets/wi_topics/views/main.twig');
	}

}