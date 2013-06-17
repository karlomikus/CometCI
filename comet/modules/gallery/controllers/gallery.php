<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends Frontend_Controller {

	function __construct()
	{
		parent::__construct();

		$this->template
			 ->set_layout(get_layout(__CLASS__));
	}

	public function index()
	{
		$this->load->model('gallery_m');

		$this->template
			 ->set('galleries', $this->gallery_m->get_all())
			 ->build('main.twig');
	}

	public function show($id = 0)
	{
		//$this->load->model('gallery_m');
		$this->load->model('gallery_files_m', 'images');

		$this->template
			 ->set('pictures', $this->images->get_many_by('gallery', $id))
			 ->build('show.twig');
	}

}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */