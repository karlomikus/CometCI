<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Modules_m extends MY_Model {

	private $modules_path = 'modules/'; // TODO: Config module directory

	/**
	 * Returns an array of modules found in modules directory
	 * @return array Array of module names
	 */
	public function list_modules()
	{
		$dir = opendir(APPPATH.$this->modules_path);
		$ignored_modules = array('.', '..');

		while (($file = readdir($dir)) !== false)
		{
			if(!in_array($file, $ignored_modules)) $modules[] = $file;
		}

		closedir($dir);

		return $modules;
	}

	/**
	 * Returns an array with currently all modules registered in database
	 * @return array Array with module names
	 */
	public function list_db_modules()
	{
		$modulesDb = parent::get_all();

		$dbModules = array();
		foreach ($modulesDb as $mod)
		{
			$dbModules[] = $mod->link;
		}

		return $dbModules;
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