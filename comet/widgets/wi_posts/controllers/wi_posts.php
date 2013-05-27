<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_posts extends Widget_Controller {
	
	public function index()
	{
		$this->load->model('posts/posts_m');
		$this->posts_m->limit($this->config->item('wi_max_posts'));

		return $this->template
			->set('posts', $this->posts_m->get_all())
			->load_view('../widgets/wi_posts/views/main.twig');
	}

}