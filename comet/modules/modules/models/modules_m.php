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

	public function get_disabled_modules()
	{
		$this->db->select('*');
		$this->db->where('enabled', 0);
		$this->db->from('modules');

		$query = $this->db->get();
		return $query->result();
	}

	public function module_disabled($module = '')
	{
		$this->db->select('enabled');
		$this->db->where('link', $module);
		$this->db->from('modules');
		$query = $this->db->get()->result();
		
		if($query->enabled == 1) return FALSE;
		else return TRUE;
	}

	public function set_module_status($module, $enabled)
	{
		$this->db->set('enabled', $enabled);
		$this->db->where('id', $module);
		$this->db->update('modules'); 
	}

}