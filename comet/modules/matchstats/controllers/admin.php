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
		//$allMatches = $this->matches->count_all();
		$data->totalWins = $this->matches->calculate_scores_rate('win');
		$data->totalLoses = $this->matches->calculate_scores_rate('lose');
		$data->totalDraws = $this->matches->calculate_scores_rate('draw');

		$this->template
			->set('title', 'Match statistics')
			->set('data', $data)
			->build('admin/main');
	}
}