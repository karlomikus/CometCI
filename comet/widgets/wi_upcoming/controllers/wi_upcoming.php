<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_upcoming extends MX_Controller {

	public function index()
	{
		$this->load->helper('matches');
		$this->load->model('matches/matches_m');

		$this->matches_m->order_by('date', 'DESC');
		$this->matches_m->limit(1);
		$query = $this->matches_m->get_upcoming_matches();

		$match = new stdClass();
		if(!empty($query))
		{
			$match->opponentlogo = get_logo($query[0]->opponent, 'opponent');
			$match->teamlogo = get_logo($query[0]->team, 'team');
			$match->date = $query[0]->date;
		}

		return $this->template
			->set_layout(null)
			->set('match', $match)
			->build('wi_upcoming/main.twig');
	}

}