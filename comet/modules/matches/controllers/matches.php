<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Matches extends Frontend_Controller {

	function __construct()
	{
		parent::__construct();

		$this->template
			 ->set_layout(get_layout(__CLASS__));
	}

	public function index()
	{
		$this->load->model('matches_m');

		$this->template
			 ->set('matches', $this->matches_m->get_all())
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