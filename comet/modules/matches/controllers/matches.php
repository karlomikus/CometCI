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

		$this->load->helper('matches');
		$this->parser->checkFunctions();		

		$count = $this->matches_m->count_all();
		$this->matches_m->limit($this->config->item('mod_max_matches'), $page);
		$this->matches_m->order_by('date', 'desc');

		// Pagination configuration
		$config = $this->config->item('pagination_frontend');
		$config['base_url'] = base_url().'matches/index/';
		$config['total_rows'] = $count;
		$config['per_page'] = $this->config->item('mod_max_matches');
		$config['uri_segment'] = 3;

		// Let's do this
		$this->pagination->initialize($config);

		$this->template
			 ->set('matches', $this->matches_m->get_matches(false))
			 ->set('pagination', $this->pagination->create_links())
			 ->build('main.twig');
	}

	public function show($id)
	{
		$this->load->model('matches_m');

		$this->load->helper('matches');
		$this->parser->checkFunctions();

		$this->template
			->set('match', $this->matches_m->get($id))
			->set('comments', $this->commentslib->render('matches', $id))
			->build('show.twig');
	}

}