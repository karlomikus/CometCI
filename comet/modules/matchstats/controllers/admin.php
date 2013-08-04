<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('matches/matches_m', 'matches');
		$this->load->model('matchstats_m', 'stats');
	}

	public function index()
	{
		$stats = $this->matches->calculate_scores_rate();

		$data = new stdClass();
		$data->totalWins = $stats->win;
		$data->totalLoses = $stats->lose;
		$data->totalDraws = $stats->draw;
		$data->totalMatches = $stats->win + $stats->lose + $stats->draw;

		$this->template
			->set('title', 'Match statistics')
			->set('data', $data)
			->build('admin/main');
	}
}