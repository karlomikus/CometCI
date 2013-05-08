<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends Frontend_Controller {

	public function index() 
	{
		$this->load->model('posts_m');
		$this->posts_m->order_by('id', 'desc');

		$this->template
			->set('posts', $this->posts_m->get_all())
			->build('main.twig');
	}

	public function show($id = 0) 
	{
		$this->load->model('posts_m');
		$this->posts_m->update_views($id);
		$this->template
			->set('post', $this->posts_m->get($id))
			->set('comments', $this->commentslib->render('posts', $id))
			->build('show.twig');
	}

	public function archive($label = 0)
	{
		$this->load->model('posts_m');
		$this->load->model('labels/labels_m');

		if(isset($label) && $label != 0) $posts = $this->posts_m->as_array()->get_by('label', $label);
		else $posts = $this->posts_m->get_all();

		$this->template
			->set('posts', $posts)
			->set('labels', $this->labels_m->get_all())
			->build('archive.twig');
	}
}