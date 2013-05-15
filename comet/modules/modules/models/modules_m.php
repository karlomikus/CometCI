<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Modules_m extends MY_Model {

	private $modules_path = 'modules/';

	public function list_modules()
	{
		$dir = opendir(APPPATH.$this->modules_path);
		$ignored_modules = array('.', '..', 'countries');

		while (($file = readdir($dir)) !== false) {
			if(!in_array($file, $ignored_modules)) $modules[]->name = $file;
		}

		closedir($dir);

		return $modules;
	}

}