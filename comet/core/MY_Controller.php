<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public $user; // Contains information about currently logged in user

	public function __construct() {
		parent::__construct();
		$this->output->enable_profiler(FALSE);

		if($this->ion_auth->logged_in()) {
			$this->user = $this->ion_auth->user()->row();
		}
		else {
			$this->user = NULL;
			$this->user->user_id = NULL;
		}

		$this->template->set('user', $this->user); // Make user information available in templates
	}

}