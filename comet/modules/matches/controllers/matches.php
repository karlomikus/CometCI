<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Matches extends Frontend_Controller {

	public function index() {
		$this->load->model('matches_m');

		$this->template
			->set('matches', $this->matches_m->get_all())
			->build('main.twig');
	}

	public function show($id) {
		$this->load->model('matches_m');
		//$this->load->library('dota2');
		//$dotaData = $this->dota2->get_dota_data('140155198');
		//echo '<pre>';
		//print_r($dotaData);
		//echo '</pre>';

		$this->template
			->set('match', $this->matches_m->get($id))
			->set('comments', $this->commentslib->render('matches', $id))
			->build('show.twig');
	}

}