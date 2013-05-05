<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roster extends Frontend_Controller {

	public function index()
	{
		$this->template
			->build('roster.twig');
	}

}

/* End of file roster.php */
/* Location: .//C/wamp/www/cms/comet/modules/roster/controllers/roster.php */