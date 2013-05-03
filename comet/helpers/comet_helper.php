<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Returns game name based on game id
 *
 * @return string
 */
function get_game_name($id) {
	$CI =& get_instance();
	$CI->load->model('games/games_m');

	return $CI->games_m->get($id)->name;
}

/**
 * Returns filename of game icon
 *
 * @return string
 */
function get_game_icon($id) {
	$CI =& get_instance();
	$CI->load->model('games/games_m');

	return $CI->games_m->get($id)->icon;
}

/**
 * Returns opponent name based on opponent id
 *
 * @return string
 */
function get_opponent_name($id) {
	$CI =& get_instance();
	$CI->load->model('opponents/opponents_m');

	return $CI->opponents_m->get($id)->name;
}

/**
 * Returns team name based on team id
 *
 * @return string
 */
function get_team_name($id) {
	$CI =& get_instance();
	$CI->load->model('teams/teams_m');

	return $CI->teams_m->get($id)->name;
}

/**
 * Returns file name based on opponent id
 *
 * @return string
 */
function get_opponent_logo($id) {
	$CI =& get_instance();
	$CI->load->model('opponents/opponents_m');

	return $CI->opponents_m->get($id)->logo;
}

/**
 * Returns file name based on team id
 *
 * @return string
 */
function get_team_logo($id) {
	$CI =& get_instance();
	$CI->load->model('teams/teams_m');

	return $CI->teams_m->get($id)->logo;
}

/**
 * Gets match score in win/draw/lose string format
 *
 * @return string
 */
function get_match_score($id) {
	$CI =& get_instance();
	$CI->load->model('matches/matches_m');

	return $CI->matches_m->get_match_outcome($id);
}

/**
 * Gets final result of the chosen team
 *
 * @return int
 */
function get_result($id, $team = true) {
	$CI =& get_instance();
	$CI->load->model('matches/matches_m');

	if($team) $side = 'team';
	else $side = 'opponent';

	return $CI->matches_m->calculate_score($side, $id);
}

/**
 * Gets round results by match ID
 *
 * @return object
 */
function get_scores($id) {
	$CI =& get_instance();
	$CI->load->model('matches/matches_m');

	return $CI->matches_m->get_scores($id);
}

function get_match_screenshots($id) {
	$CI =& get_instance();
	$CI->load->model('matches/matches_m');

	return $CI->matches_m->get_match_screenshots($id);
}

function user_uri($id) {
	return 'users/profile/'.$id;
}

function get_countries() {
	$CI =& get_instance();
	$CI->load->model('countries/countries_m');

	return $CI->countries_m->get_all();
}

function get_label_name($id) {
	$CI =& get_instance();
	$CI->load->model('labels/labels_m');
	if(!isset($id)) return "Undefined label";
	return $CI->labels_m->get($id)->name;
}

function get_avatar($userID, $fulltag = FALSE) {
	$CI =& get_instance();
	
	$avatar = $CI->ion_auth->user($userID)->row()->avatar;
	if(!$fulltag) {
		if(isset($avatar)) return $avatar;
		return 'noavatar.jpg';
	}
	if(isset($avatar)) return '<img src="'.base_url().'uploads/users/'.$avatar.'" alt="avatar" />';
	return '<img src="'.base_url().'uploads/users/noavatar.jpg" alt="avatar" />';
}

function widget($name) {
	return Modules::run('wi_'.$name);
}