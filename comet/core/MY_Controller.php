<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public $user; 	  		// Contains information about currently logged in user
	public $setting;  		// Contains site settings
	public $activeTheme;	// Contains current active theme

	public function __construct()
	{
		parent::__construct();

		// Enable debugging
		$this->output->enable_profiler(false);

		// Load libraries
		$this->load->model('settings/settings_m', 'settings');

		// Set config items
		$this->setting = $this->settings->get(1);
		$this->config->set_item('clanname', $this->setting->clanname);
		$this->activeTheme = $this->setting->theme;

		// Set user
		if($this->ion_auth->logged_in())
		{
			$this->user = $this->ion_auth->user()->row();
		}
		else
		{
			$this->user = NULL;
			$this->user->user_id = NULL;
		}

		// Make user information available in templates
		$this->template->set('user', $this->user);

		// Update visits
		$this->load->model('comet_m', 'site');
		$this->site->update_site_views($this->user->user_id);
	}

}