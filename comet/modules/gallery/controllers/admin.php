<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/gallery/';

	public function __construct()
	{
		parent::__construct();

		$this->load->model('gallery_m');
	}

	public function index()
	{
		$this->load->helper('text');

		$this->template
			->set('title', 'Labels')
			->build('admin/main');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');
	}
}