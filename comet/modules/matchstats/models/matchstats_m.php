<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Matchstats_m extends MY_Model {

	public function calculateTotalScores($type = 'wins')
	{
		$this->_table = 'matches_scores';
		$query = parent::get_all();

		foreach($query as $score) {
			if($side == 'team') $result += $score->team;
			else $result += $score->opponent;
		}
	}

	public function calculateWinRate($week = '')
	{
		$this->_table = 'matches_scores';
		$query = parent::get_all();
	}
}