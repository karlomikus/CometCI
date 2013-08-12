<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Basic helper functions to make using of CMS easier
 */
function get_game_name($id) 
{
	$CI =& get_instance();
	$CI->load->model('games/games_m');

	return $CI->games_m->get($id)->name;
}

function get_game_icon($id, $format = FALSE) 
{
	$CI =& get_instance();
	$CI->load->model('games/games_m');

	if(!empty($CI->games_m->get($id)->icon))
	{
		if($format) return '<img src="'.base_url().'assets/games/'.$CI->games_m->get($id)->icon.'" title="'.$CI->games_m->get($id)->name.'" style="display: inline-block;" />';
		else return $CI->games_m->get($id)->icon;
	}
	else return '';
}

/* ================ */

function get_opponent_name($id) 
{
	$CI =& get_instance();
	$CI->load->model('opponents/opponents_m');

	return $CI->opponents_m->get($id)->name;
}

function get_team_name($id) 
{
	$CI =& get_instance();
	$CI->load->model('teams/teams_m');

	if(!empty($CI->teams_m->get($id)->name)) return $CI->teams_m->get($id)->name;
	return 'Undefined';
}

/* ================ */

function get_countries() 
{
	$CI =& get_instance();
	$CI->load->model('countries/countries_m');

	return $CI->countries_m->get_all();
}

function get_country($id, $what = 'name', $format = TRUE)
{
	if(!isset($id)) return;

	$CI =& get_instance();
	$CI->load->model('countries/countries_m');

	if($what == 'name')
	{
		if(!empty($CI->countries_m->get($id)->name)) return $CI->countries_m->get($id)->name;
		return '';
	}
	else
	{
		if(!empty($CI->countries_m->get($id)->code))
		{
			if($format)
			return '<img src="'.base_url().'assets/countries/'.$CI->countries_m->get($id)->code.'.png" />';
			return $CI->countries_m->get($id)->code.'.png';
		}

		return '';
	}
}

function get_label_name($id) 
{
	$CI =& get_instance();
	$CI->load->model('labels/labels_m');

	$labelName = $CI->labels_m->get($id);
	if(empty($labelName)) return 'Undefined';

	return $labelName->name;
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

	if(!$fulltag)
	{
		if(!empty($avatar->avatar) && file_exists('./uploads/users/'.$avatar->avatar)) return $avatar->avatar;
		return 'noavatar.jpg';
	}

	if(!empty($avatar->avatar) && file_exists('./uploads/users/'.$avatar->avatar))
	{
		return '<img src="'.base_url().'uploads/users/'.$avatar->avatar.'" alt="avatar" />';
	}

	return '<img src="'.base_url().'uploads/users/noavatar.jpg" alt="avatar" />';
}

/**
 * Get username by $userID. You can optionally create
 * link to user's profile page.
 * 
 * @param  int  $userID  User ID
 * @param  boolean $linkify Create hyperlink
 * @return string
 */
function get_username($userID, $linkify = TRUE) 
{
	$CI =& get_instance();

	$do_links = $CI->config->item('linkify_users');
	if(!$linkify) $do_links = FALSE;

	$query = $CI->ion_auth->user($userID)->row();
	$username = NULL;
	if(isset($query->username))
	{
		$data = $query->username;

		if($do_links) $username = '<a href="'.base_url().'profile/'.$userID.'">'.$data.'</a>';
		else $username = $data;
	}

	return $username;
}

function get_user_id($username)
{
	$CI =& get_instance();
	$CI->db->where('username', $username);
	$query = $CI->db->get('users');

	return $query->row()->id;
}

function check_pms($userID)
{
	$CI =& get_instance();
	$CI->load->model('messages/messages_m', 'msg');

	return $CI->msg->check_pms($userID);
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

function count_gallery_items($galleryID = 0)
{
	$CI =& get_instance();
	$CI->load->model('gallery/gallery_files_m', 'gallery');

	return $CI->gallery->count_by('gallery', $galleryID);
}

function show_gallery_preview($galleryID = 0)
{
	$CI =& get_instance();
	$CI->load->model('gallery/gallery_files_m', 'gallery');
	//$row = $this->article_model->get_by('title', 'Fuzzy Wuzzy');

	return $CI->gallery->get_by('gallery', $galleryID)->file;
}

function get_module_id($link)
{
	$CI =& get_instance();
	$CI->load->model('modules/modules_m');

	return $CI->modules_m->get_module_id_from_link($link);
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
	$CI->load->model('settings/settings_m');
	$module = strtolower($moduleName);

	// TODO: Remove error suppressing
	$moduleLayout = @$CI->modules_m->get_by('name', $module)->layout;

	if(empty($moduleLayout)) $moduleLayout = $CI->settings_m->get(1)->layout;

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