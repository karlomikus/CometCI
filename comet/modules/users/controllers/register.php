<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends Frontend_Controller {

	public function index()
	{
		$this->load->library('form_validation');

		if($this->form_validation->run()) {
			//register
		}
		else {
			$this->template
			->build('register.twig');
		}
		
	}

}

/* End of file register.php */
/* Location: .//C/wamp/www/cms/comet/modules/users/controllers/register.php */