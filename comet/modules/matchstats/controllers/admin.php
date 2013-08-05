<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('matches/matches_m', 'matches');
	}

	public function index()
	{
		$this->load->helper('matches');

		$stats = $this->matches->calculate_scores_rate();

		$data = new stdClass();
		$data->totalWins = $stats->win;
		$data->totalLoses = $stats->lose;
		$data->totalDraws = $stats->draw;
		$data->totalMatches = $stats->win + $stats->lose + $stats->draw;

		$data->weekRate = $this->matches->get_matches_in_week();

		$data->popularGames = $this->matches->get_popular_games(5);
		$data->popularTeams = $this->matches->get_popular_teams(5);

		$data->popularPlayers = $this->matches->get_popular_players();

		$this->template
			->set('title', 'Match statistics')
			->set('data', $data)
			->build('admin/main');
	}
}