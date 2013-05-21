<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public $theme;
	public $layoutName;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('file');

		$this->theme = 'default';
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('file', 'Contents', 'required');

		if($this->form_validation->run())
		{
			$data = $this->input->post('file');
			if(!write_file('./themes/'.$this->theme.'/views/layouts/default.twig', $data)) {
				echo 'Unable to write the file';
			}
			else {
				echo 'File written!';
			}
		}
		else
		{
			$this->template
			->set('title', 'Layouts')
			->set('layouts', $this->template->get_theme_layouts($this->theme))
			->build('admin/main');
		}
	}

	/**
	 * Get layout HTML contents
	 * @return void
	 */
	public function fetch_layout()
	{
		if (!$this->input->is_ajax_request()) redirect('admin/layouts');

		if(isset($_POST) && isset($_POST['layout']))
		{
			$layout = $_POST['layout']; // TODO: SECURITY CHECK
			$this->layoutName = $layout;
			$file 	= read_file('./themes/'.$this->theme.'/views/layouts/'.$layout);
			echo $file;
		}
		else
		{
			redirect('admin/layouts');
		}
	}
}