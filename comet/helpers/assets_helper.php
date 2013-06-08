<?php defined('BASEPATH') OR exit('No direct script access allowed');

function theme_asset($file_path)
{
	$CI =& get_instance();
	$CI->load->model('settings/settings_m', 'settings');

	$theme = $CI->settings->get_site_theme();
	return base_url('themes/'.$theme.'/'.$file_path);
}

function system_assets()
{
	$systemCss = base_url('assets/css/system.css');
	return $systemCss;
}

function asset($file_path, $admin = TRUE) {
	if($admin) return base_url('assets/admin/'.$file_path);
	return base_url('assets/'.$file_path);
}