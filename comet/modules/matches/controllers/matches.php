<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Matches extends Frontend_Controller {

	function __construct()
	{
		parent::__construct();

		$this->template
			 ->set_layout(get_layout(__CLASS__));
	}

	public function index($page = 0)
	{
		$this->load->model('matches_m');
		$this->load->library('pagination');

		$count = $this->matches_m->count_all();
		$this->matches_m->limit($this->config->item('mod_max_matches'), $page);

		// Pagination configuration
		$config['base_url'] = base_url().'matches/index/';
		$config['total_rows'] = $count;
		$config['per_page'] = $this->config->item('mod_max_matches');
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
			 ->set('matches', $this->matches_m->get_all())
			 ->set('pagination', $this->pagination->create_links())
			 ->build('main.twig');
	}

	public function show($id)
	{
		$this->load->model('matches_m');

		$this->template
			->set('match', $this->matches_m->get($id))
			->set('comments', $this->commentslib->render('matches', $id))
			->build('show.twig');
	}

}