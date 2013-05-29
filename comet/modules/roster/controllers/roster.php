<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clan Comet CMS
 * http://comet.kami.com/
 *
 * An Content Management System aimed to gaming
 * teams for easier management of their website
 * based on Codeigniter framework
 *
 * @author Karlo Mikuš
 */
class Roster extends Frontend_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->template
			->set_layout(get_layout(__CLASS__));
	}

	public function index()
	{
		$this->load->model('roster_m');

		$this->template
			->set('data', $this->roster_m->get_teams())
			->build('roster.twig');
	}

}

/* End of file roster.php */
/* Location: modules/roster/controllers/roster.php */