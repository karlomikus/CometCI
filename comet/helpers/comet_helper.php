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
function get_game_icon($id, $format = FALSE) 
{
	$CI =& get_instance();
	$CI->load->model('games/games_m');

	if($format) return '<img src="'.base_url().'assets/games/'.$CI->games_m->get($id)->icon.'" title="'.$CI->games_m->get($id)->name.'" style="display: inline-block;" />';
	else return $CI->games_m->get($id)->icon;
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

	$logo = $CI->opponents_m->get($id)->logo;
	if(empty($logo)) $logo = 'nopic.jpg';

	return $logo;
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

	$logo = $CI->teams_m->get($id)->logo;
	if(empty($logo)) $logo = 'nopic.jpg';

	return $logo;
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
 * Get country information
 * @param  int  $id   Country ID
 * @param  string  $type What info do you want, name or icon
 * @param  boolean $format Should it return HTML formatted flag image
 * @return string
 */
function get_country_info($id, $type = 'name', $format = TRUE)
{
	$CI =& get_instance();
	$CI->load->model('countries/countries_m');

	if($type == 'name') {
		return $CI->countries_m->get($id)->name;
	}
	else {
		if($format) return '<img src="'.base_url().'assets/countries/'.$CI->countries_m->get($id)->code.'.png" alt="'.$CI->countries_m->get($id)->code.'" style="display: inline-block;" />';
		return $CI->countries_m->get($id)->code.'.png';
	}
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
	
	$avatar = $CI->ion_auth->user($userID)->row();
	if(!$fulltag) {
		if(isset($avatar->avatar)) return $avatar->avatar;
		return 'noavatar.jpg';
	}
	if(isset($avatar->avatar)) return '<img src="'.base_url().'uploads/users/'.$avatar->avatar.'" alt="avatar" />';
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

function get_full_roster($teamID = 0)
{
	$CI =& get_instance();
	$CI->load->model('roster/roster_m');

	return $CI->roster_m->get_team_roster($teamID);
}

function get_team_games($teamID)
{
	$CI =& get_instance();
	$CI->load->model('roster/roster_m');

	return $CI->roster_m->get_team_games($teamID);
}

function get_event_data($eventID = 0)
{
	$CI =& get_instance();
	$CI->load->model('events/events_m');

	return $CI->events_m->get($eventID);
}

function count_gallery_items($galleryID = 0)
{
	$CI =& get_instance();
	$CI->load->model('gallery/gallery_files_m', 'gallery');

	return $CI->gallery->count_by('gallery', $galleryID);
}

/**
 * Format date by format defined in cms
 * @param  string $date Date string
 * @return string
 */
function cms_date($date = '')
{
	$CI =& get_instance();
	if(empty($date)) $dateFormat = time();
	else $dateFormat = strtotime($date);

	return date($CI->config->item('cms_date_format'), $dateFormat);
}

/**
 * Format time by format defined in cms
 * @param  string $date Date string
 * @return string
 */
function cms_time($time = '')
{
	$CI =& get_instance();
	if(empty($time)) $timeFormat = time();
	else $timeFormat = strtotime($time);
	
	return date($CI->config->item('cms_time_format'), $timeFormat);
}

/**
 * Get layout defined only to be used for $moduleName
 * @param  string $moduleName Name of the module
 * @return string Layout filename
 */
function get_layout($moduleName = '')
{
	$CI =& get_instance();
	$CI->load->model('modules/modules_m');
	$module = strtolower($moduleName);

	$moduleLayout = $CI->modules_m->get_by('name', $module)->layout;

	if($CI->template->layout_exists($moduleLayout.'.twig')) return $moduleLayout.'.twig';
	else return 'default.twig';
}

/**
 * Makes table column a link containg sort url.
 * 
 * @param  string $module        Module name
 * @param  string $column        Table column name
 * @param  string $order         Ascending or descending order
 * @param  int $page             Current page
 * @param  string $currentColumn Current selected column
 * @return string                Full link with an icon
 */
function sort_link($module, $column, $order, $page, $currentColumn)
{
	$iconDesc = '<i class="icon-angle-up"></i>';
	$iconAsc = '<i class="icon-angle-down"></i>';
	$orderBy = strtolower($column);

	if($orderBy == $currentColumn)
	{
		if($order == 'asc') $icon = $iconAsc;
		else $icon = $iconDesc;
	}
	else $icon = '';

	return "<a href=\"".base_url()."admin/$module/index/$orderBy/$order/$page\">$column</a> $icon";
}

/**
 * Wrapper function for easier access
 * in twig parser. Loads module
 * then injects it into the layout
 * @param  string $name Widget name without "wi_"
 * @return object       Module object
 */
function widget($name) 
{
	return Modules::run('wi_'.$name);
}

/**
 * Load ellipsize through this helper so it can
 * be accessed in widgets twig parser. Need to find
 * a better way to do this!
 * @param  string $string String to be shortened
 * @param  int    $length
 * @return string
 */
function helper_ellip($string, $length)
{
	$CI =& get_instance();
	$CI->load->helper('text');
	return ellipsize($string, $length); 
}

/**
 * Automatically generate nice URL from string
 * @param  string $str       Original text
 * @param  array  $replace   Replace text
 * @param  string $delimiter Delimiter
 * @return string            Clean string
 */
setlocale(LC_ALL, 'en_US.UTF8');
function makePageSlug($str, $replace = array(), $delimiter = '-')
{
	if(!empty($replace)) $str = str_replace((array)$replace, ' ', $str);
	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	$clean = (strlen($clean) > 35) ? substr($clean, 0, 35) : $clean;
	$clean = strtolower(trim($clean, '-'));

	return $clean;
}