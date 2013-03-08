<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends Frontend_Controller {

	public function index() {
		$this->load->model('posts_m');
		
		$this->template
			->set('posts', $this->posts_m->get_all())
			->build('main');
	}
}