<?php defined('BASEPATH') OR exit('No direct script access allowed');

function get_result($id, $side) 
{
	$CI =& get_instance();
	$CI->load->model('matches/matches_m');

	if($side == 1) $team = 'team';
	else $team = 'opponent';

	return $CI->matches_m->calculate_score($team, $id);
}

function get_scores($id) 
{
	$CI =& get_instance();
	$CI->load->model('matches/matches_m');

	return $CI->matches_m->get_scores($id);
}

function get_match_screenshots($id) 
{
	$CI =& get_instance();
	$CI->load->model('matches/matches_m');

	return $CI->matches_m->get_match_screenshots($id);
}

function get_match_result($matchID, $format = '')
{
	$CI =& get_instance();
	$CI->load->model('matches/matches_m');

	return $CI->matches_m->get_match_outcome($matchID, $format);
}

function get_logo($id, $team)
{
	$CI =& get_instance();

	if($team == 'opponent')
	{
		$CI->load->model('opponents/opponents_m');
		$result = $CI->opponents_m->get($id);
	}
	else
	{
		$CI->load->model('teams/teams_m');
		$result = $CI->teams_m->get($id);
	}

	return $result->logo;
}