<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_m extends MY_Model {

	public function get_site_theme()
	{
		return parent::get(1)->theme;
	}
}