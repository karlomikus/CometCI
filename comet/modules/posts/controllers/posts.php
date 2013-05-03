<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends Frontend_Controller {

	public function index() {
		$this->load->model('posts_m');
		$this->posts_m->order_by('id', 'desc');

		$this->template
			->set('posts', $this->posts_m->get_all())
			->build('main.twig');
	}

	public function show($id = 0) {
		$this->load->model('posts_m');
		$this->template
			->set('post', $this->posts_m->get($id))
			->set('comments', $this->commentslib->render('posts', $id))
			->build('show.twig');
	}
}