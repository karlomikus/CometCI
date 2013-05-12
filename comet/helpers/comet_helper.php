<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Basic helper functions to make using of CMS easier
 */

/**
 * Returns game name based on game id
 *
 * @return string
 */
function get_game_name($id) 
{
	$CI =& get_instance();
	$CI->load->model('games/games_m');

	return $CI->games_m->get($id)->name;
}

/**
 * Returns filename of game icon
 *
 * @return string
 */
function get_game_icon($id) 
{
	$CI =& get_instance();
	$CI->load->model('games/games_m');

	return $CI->games_m->get($id)->icon;
}

/**
 * Returns opponent name based on opponent id
 *
 * @return string
 */
function get_opponent_name($id) 
{
	$CI =& get_instance();
	$CI->load->model('opponents/opponents_m');

	return $CI->opponents_m->get($id)->name;
}

/**
 * Returns team name based on team id
 *
 * @return string
 */
function get_team_name($id) 
{
	$CI =& get_instance();
	$CI->load->model('teams/teams_m');

	return $CI->teams_m->get($id)->name;
}

/**
 * Returns file name based on opponent id
 *
 * @return string
 */
function get_opponent_logo($id) 
{
	$CI =& get_instance();
	$CI->load->model('opponents/opponents_m');

	return $CI->opponents_m->get($id)->logo;
}

/**
 * Returns file name based on team id
 *
 * @return string
 */
function get_team_logo($id) 
{
	$CI =& get_instance();
	$CI->load->model('teams/teams_m');

	return $CI->teams_m->get($id)->logo;
}

/**
 * Gets match score in win/draw/lose string format
 *
 * @return string
 */
function get_match_score($id) 
{
	$CI =& get_instance();
	$CI->load->model('matches/matches_m');

	return $CI->matches_m->get_match_outcome($id);
}

/**
 * Gets final result of the chosen team
 *
 * @return int
 */
function get_result($id, $team = true) 
{
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
function get_scores($id) 
{
	$CI =& get_instance();
	$CI->load->model('matches/matches_m');

	return $CI->matches_m->get_scores($id);
}
/**
 * Gets match screenshots by match ID
 * @param  int $id Match ID
 * @return object     Database object
 */
function get_match_screenshots($id) 
{
	$CI =& get_instance();
	$CI->load->model('matches/matches_m');

	return $CI->matches_m->get_match_screenshots($id);
}

/**
 * Gets list of all countries in the database
 * @return object Database object
 */
function get_countries() 
{
	$CI =& get_instance();
	$CI->load->model('countries/countries_m');

	return $CI->countries_m->get_all();
}

/**
 * Get label name from label ID
 * @param  int $id 	Label ID
 * @return string   Name of the label
 */
function get_label_name($id) 
{
	$CI =& get_instance();
	$CI->load->model('labels/labels_m');
	if(!isset($id)) return "Undefined label";
	return $CI->labels_m->get($id)->name;
}

/**
 * Get avatar information from user's ID
 * @param  int  $userID  User ID
 * @param  boolean $fulltag If true returns HTML format of avatar image
 * @return string           Avatar filename
 */
function get_avatar($userID, $fulltag = FALSE) 
{
	$CI =& get_instance();
	
	$avatar = $CI->ion_auth->user($userID)->row()->avatar;
	if(!$fulltag) {
		if(isset($avatar)) return $avatar;
		return 'noavatar.jpg';
	}
	if(isset($avatar)) return '<img src="'.base_url().'uploads/users/'.$avatar.'" alt="avatar" />';
	return '<img src="'.base_url().'uploads/users/noavatar.jpg" alt="avatar" />';
}

/**
 * Gets username from user ID
 * @param  int $userID User ID
 * @return string         Username of the user
 */
function get_username($userID) 
{
	$CI =& get_instance();

	if(isset($CI->ion_auth->user($userID)->row()->username)) return $CI->ion_auth->user($userID)->row()->username;
	else return NULL;
}

/**
 * Parser markdown format of text
 * @param  string $text Text containing markdown content
 * @return string       HTML output of text
 */
function parse_markdown($text)
{
	$CI =& get_instance();
	$CI->load->library('markdown');

	return $CI->markdown->parse($text);
}

/**
 * Wrapper function for easier access
 * in twig parser. Loads module
 * then injects it into the layout
 * 
 * @param  string $name Widget name without "wi_"
 * @return object      Module object
 */
function widget($name) 
{
	return Modules::run('wi_'.$name);
}