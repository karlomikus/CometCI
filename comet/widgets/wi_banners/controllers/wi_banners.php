<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_banners extends Frontend_Controller {

	public function index()
	{
		$this->load->model('banners/banners_m', 'banners');

		echo $this->template
			->set('banners', $this->banners->get_all())
			->load_view('../widgets/wi_banners/views/main.twig');
	}

}