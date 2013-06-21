<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Site-wide settings
 */
$config['clanname'] = 'Team Comet';
$config['cms_date_format'] = 'd.m.Y';
$config['cms_time_format'] = 'H:i';
$config['linkify_users'] = TRUE;

/**
 * Module-specific settings
 */
$config['mod_max_posts'] = 6;
$config['mod_max_matches'] = 20;

/**
 * Widget-specific setttings
 */
$config['wi_max_matches'] = 6;
$config['wi_max_posts'] = 6;

/**
 * Frontend and backend pagination template
 */
$config['pagination_frontend']['next_link'] = '&raquo;';
$config['pagination_frontend']['prev_link'] = '&laquo;';
$config['pagination_frontend']['full_tag_open'] = '<ul class="cms-pagination">';
$config['pagination_frontend']['full_tag_close'] = '</ul>';
$config['pagination_frontend']['num_tag_open'] = '<li>';
$config['pagination_frontend']['num_tag_close'] = '</li>';
$config['pagination_frontend']['cur_tag_open'] = '<li class="pagination-selected">';
$config['pagination_frontend']['cur_tag_close'] = '</li>';
$config['pagination_frontend']['next_tag_open'] = '<li>';
$config['pagination_frontend']['next_tag_close'] = '</li>';
$config['pagination_frontend']['prev_tag_open'] = '<li>';
$config['pagination_frontend']['prev_tag_close'] = '</li>';

$config['pagination_backend']['last_link'] = FALSE;
$config['pagination_backend']['first_link'] = FALSE;
$config['pagination_backend']['next_link'] = '<i class="icon-angle-right"></i>';
$config['pagination_backend']['prev_link'] = '<i class="icon-angle-left"></i>';
$config['pagination_backend']['full_tag_open'] = '<ul>';
$config['pagination_backend']['full_tag_close'] = '</ul>';
$config['pagination_backend']['num_tag_open'] = '<li>';
$config['pagination_backend']['num_tag_close'] = '</li>';
$config['pagination_backend']['cur_tag_open'] = '<li class="active"><a href="">';
$config['pagination_backend']['cur_tag_close'] = '</a></li>';
$config['pagination_backend']['next_tag_open'] = '<li>';
$config['pagination_backend']['next_tag_close'] = '</li>';
$config['pagination_backend']['prev_tag_open'] = '<li>';
$config['pagination_backend']['prev_tag_close'] = '</li>';

/* End of file comet.php */
/* Location: ./comet/config/comet.php */