<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/labels/';

	public function __construct()
	{
		parent::__construct();

		$this->load->model('navigation_m');
	}

	public function index()
	{
		$this->load->helper('text');

		$this->navigation_m->order_by('sort');

		$this->template
			->set('title', 'Site navigation')
			->set('links', $this->navigation_m->get_all())
			->build('admin/main');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|htmlspecialchars|trim|min_length[4]|xss_clean');
		$this->form_validation->set_rules('url', 'URL', 'prep_url|htmlspecialchars|trim|xss_clean');
		$this->form_validation->set_rules('sort', 'Sort power', 'htmlspecialchars|trim|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			// Determine the type of the link
			$urlPost = $this->input->post('url');
			if(empty($urlPost))
			{
				$type = 'uri';
				$uriPost = $this->input->post('uri');

				// Page URI
				if(is_numeric($uriPost))
				{
					$this->load->model('pages/pages_m');
					$query = $this->pages_m->get($uriPost);
					$link = $query->slug;
				}
				else
				{
					$link = $uriPost;
				}
			}
			else
			{
				$type = 'url';
				$link = $urlPost;
			}

			$data = array(
				'name' => $this->input->post('name'),
				'link' => $link,
				'type' => $type,
				'sort' => $this->input->post('sort')
			);

			$this->navigation_m->insert($data);
			redirect('admin/navigation');
		}
		else
		{
			$this->load->model('pages/pages_m');
			$this->load->model('modules/modules_m');

			$modules = $this->modules_m->get_all();
			$pages = $this->pages_m->get_all();

			$this->template
				->set('title', 'Add navigation link')
				->set('pages', $pages)
				->set('modules', $modules)
				->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		$this->navigation_m->delete($id);
		redirect('admin/navigation');
	}
}