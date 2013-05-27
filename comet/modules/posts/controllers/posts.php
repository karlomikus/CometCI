<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends Frontend_Controller {

	function __construct()
	{
		parent::__construct();
		$this->template
			->set_layout(get_layout(__CLASS__));
	}

	public function index($page = 0) 
	{
		$this->load->library('pagination');
		$this->load->model('posts_m');

		$count = $this->posts_m->count_all();
		$this->posts_m->order_by('id', 'desc');
		$this->posts_m->limit($this->config->item('mod_max_posts'), $page);

		// Pagination configuration
		$config['base_url'] = base_url().'posts/index/';
		$config['total_rows'] = $count;
		$config['per_page'] = $this->config->item('mod_max_posts');
		$config['uri_segment'] = 3;

		// Template
		$config['next_link'] = '&raquo;';
		$config['prev_link'] = '&laquo;';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="current"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li class="arrow">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="arrow">';
		$config['prev_tag_close'] = '</li>';

		// Let's do this
		$this->pagination->initialize($config);

		$this->template
			->set('posts', $this->posts_m->get_all())
			->set('pagination', $this->pagination->create_links())
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