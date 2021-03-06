<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_featured_post extends MX_Controller {
	
	public function index()
	{
		$this->load->model('posts/posts_m');

		$this->posts_m->order_by('date', 'DESC');
		$this->posts_m->limit(1);

		$query = $this->posts_m->get_featured_posts();
		$post->title = $query[0]->title;
		$post->content = $query[0]->body;
		$post->slug = $query[0]->slug;

		return $this->template
			->set_layout(null)
			->set('post', $post)
			->build('wi_featured_post/main.twig');
	}

}