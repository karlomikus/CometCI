<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_matches extends Frontend_Controller {

	public function index()
	{
		$this->load->helper('matches');
		$this->load->model('matches/matches_m');

		$this->matches_m->order_by('date', 'DESC');
		$this->matches_m->limit($this->config->item('wi_max_matches'));
		$query = $this->matches_m->get_matches(FALSE);

		$matches = array();
		foreach ($query as $key => $value)
		{
			$matches[$key] 				= new stdClass();
			$matches[$key]->id 			= $value->id;
			$matches[$key]->opponent 	= $value->opponent;
			$matches[$key]->game 		= $value->game;
			$matches[$key]->result 		= get_match_result($value->id, 'text');
		}

		echo $this->template
			->set('matches', $matches)
			->load_view('../widgets/wi_matches/views/main.twig');
	}

}