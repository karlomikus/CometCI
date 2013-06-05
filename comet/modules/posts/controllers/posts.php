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

		$count = $this->posts_m->count_by('state', '1');
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
			->set('posts', $this->posts_m->get_many_by('state', '1'))
			->set('pagination', $this->pagination->create_links())
			->build('main.twig');
	}

	public function show($id = '') 
	{
		if(empty($id)) show_404();
		$this->load->model('posts_m');

		if(is_numeric($id))
		{
			$data = $this->posts_m->get($id);
			if(empty($data)) show_404();
			$postID = $id;
			$this->posts_m->update_views($id);
		}
		else
		{
			$data = $this->posts_m->get_by('slug', $id);
			if(empty($data)) show_404();
			$postID = $this->posts_m->get_id_from_slug($id);
			$this->posts_m->update_views($postID);
		}

		$this->template
			->set('post', $data)
			->set('comments', $this->commentslib->render('posts', $postID))
			->build('show.twig');
	}

	public function archive($label = 0)
	{
		$this->load->model('posts_m');
		$this->load->model('labels/labels_m');

		if(!empty($label)) $posts = $this->posts_m->get_many_by('label', $label);
		else $posts = $this->posts_m->get_all();

		$currentLabel = (!empty($label)) ? get_label_name($label) : 'all';

		$this->template
			->set('posts', $posts)
			->set('currentlabel', $currentLabel)
			->set('labels', $this->labels_m->get_all())
			->build('archive.twig');
	}
}