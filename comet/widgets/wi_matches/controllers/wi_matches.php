<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_matches extends Frontend_Controller {

	public function index()
	{
		$this->load->model('matches/matches_m');
		$this->matches_m->order_by('date', 'DESC');
		$this->matches_m->limit($this->config->item('wi_max_matches'));

		echo $this->template
			->set('matches', $this->matches_m->get_matches(FALSE))
			->load_view('../widgets/wi_matches/views/main.twig');
	}

}