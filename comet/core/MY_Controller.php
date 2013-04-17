<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	// "Global" variable that cointains information about currently logged in user
	public $user;

	public function __construct() {
		parent::__construct();

		$this->output->enable_profiler(FALSE);

		if($this->ion_auth->logged_in()) {
			$this->user = $this->ion_auth->user()->row(); // Set variable
			$this->template->set('user', $this->user);
		}
		else {
			$this->user = NULL;
			$this->template->set('user', 'Guest');
		}
	}

}