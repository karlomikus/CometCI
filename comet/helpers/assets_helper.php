<?php defined('BASEPATH') OR exit('No direct script access allowed');

function theme_asset($file_path, $theme = 'default') {
	return base_url('themes/'.$theme.'/'.$file_path);
}

function asset($file_path, $admin = TRUE) {
	if($admin) return base_url('assets/admin/'.$file_path);
	return base_url('assets/'.$file_path);
}