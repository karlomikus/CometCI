<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_posts extends MX_Controller {
	
	public function index()
	{
		$this->load->model('posts/posts_m');
		$this->posts_m->limit($this->config->item('wi_max_posts'));

		return $this->template
			->set_layout(null)
			->set('posts', $this->posts_m->get_all())
			->build('wi_posts/main.twig');
	}

}