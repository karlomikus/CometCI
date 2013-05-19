<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load required libs
		$this->load->model('settings/settings_m', 'settings');
		$this->load->model('modules/modules_m', 'modules');

		// Set variables
		$activeTheme = $this->settings->get_site_theme();
		$disabledModules = $this->modules->get_disabled_modules();
		$currentModule = $this->router->fetch_module();

		// Go through array and check for disabled modules
		foreach ($disabledModules as $module) {
			if($currentModule == $module->link) show_error('Module disabled!');
		}

		$this->template
			->set('clanname', $this->config->item('clanname'))
			->set_theme($activeTheme);
	}
}