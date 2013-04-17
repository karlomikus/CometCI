<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_matches extends Frontend_Controller {

	public function index() {
		$this->load->model('matches/matches_m');
		echo $this->template
			->set('matches', $this->matches_m->get_all())
			->load_view('../widgets/wi_matches/views/main.twig');
	}

}