<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_banners extends MX_Controller {

	public function index()
	{
		$this->load->model('banners/banners_m', 'banners');

		return $this->template
			->set_layout(null)
			->set('banners', $this->banners->get_all())
			->build('wi_banners/main.twig');
	}

}