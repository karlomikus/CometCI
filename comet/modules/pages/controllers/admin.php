<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('pages_m');
	}

	public function index()
	{	
		$this->load->helper('text');

		$this->template
			->set('title', 'Pages')
			->set('pages', $this->pages_m->get_all())
			->build('admin/main');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->helper('htmlpurifier');
		$this->load->library('form_validation');

		$this->template->append_metadata(Assets::adminJs('ckeditor', 'js/ckeditor'));

		$this->form_validation->set_rules('name', 'Name', 'required|trim|htmlspecialchars|min_length[4]|xss_clean');
		$this->form_validation->set_rules('slug', 'Page slug', 'required|max_length[30]|min_length[3]|is_unique[pages.slug]');
		$this->form_validation->set_rules('access', 'Access level', 'required');
		$this->form_validation->set_rules('navigation', 'Navigation link name', 'trim|required|min_length[4]|htmlspecialchars|max_length[20]|xss_clean');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$navLink = $this->input->post('navigation');
			$slug = makePageSlug($this->input->post('slug'));

			$data = array(
				'name' => $this->input->post('name'),
				'description' => html_purify($this->input->post('description'), 'description'),
				'slug' => $slug,
				'content' => html_purify($this->input->post('content'), 'wysiwyg'),
				'navigation' => $navLink,
				'layout' => $this->input->post('layout'),
				'date' => date('Y-m-d H:i'),
				'access' => $this->input->post('access')
			);

			$this->pages_m->insert($data);

			// Create navigation link
			$this->load->model('navigation/navigation_m');
			$dataNav = array(
				'name' => $navLink,
				'link' => $slug,
				'type' => 'uri'
			);

			$this->navigation_m->insert($dataNav);

			redirect('admin/pages');
		}
		else
		{
			$this->template
				->set('title', 'Create page')
				->set('layouts', $this->template->get_theme_layouts($this->setting->theme))
				->build('admin/form');
		}
	}

	public function edit($id = 0) {

		$this->load->helper('form');
		$this->load->helper('htmlpurifier');
		$this->load->library('form_validation');

		$this->template->append_metadata(Assets::adminJs('ckeditor', 'js/ckeditor'));

		$this->form_validation->set_rules('name', 'Name', 'required|trim|htmlspecialchars|min_length[4]|xss_clean');
		$this->form_validation->set_rules('slug', 'Page slug', 'required|max_length[30]|min_length[3]|is_unique[pages.slug]');
		$this->form_validation->set_rules('access', 'Access level', 'required');
		$this->form_validation->set_rules('navigation', 'Navigation link name', 'trim|required|min_length[4]|htmlspecialchars|max_length[20]|xss_clean');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$navLink = $this->input->post('navigation');
			$oldSlug = $this->pages_m->get($id)->slug;
			$slug = makePageSlug($this->input->post('slug'));

			$data = array(
				'name' => $this->input->post('name'),
				'description' => html_purify($this->input->post('description'), 'description'),
				'slug' => $slug,
				'content' => html_purify($this->input->post('content'), 'wysiwyg'),
				'navigation' => $navLink,
				'layout' => $this->input->post('layout'),
				'date' => date('Y-m-d H:i'),
				'access' => $this->input->post('access')
			);

			$this->pages_m->update($id, $data);

			// Edit navigation link
			$this->load->model('navigation/navigation_m');
			
			$this->navigation_m->delete_by(array('link' => $oldSlug));
			$dataNav = array(
				'name' => $navLink,
				'link' => $slug,
				'type' => 'uri'
			);

			$this->navigation_m->insert($dataNav);

			redirect('admin/pages');
		}
		else
		{
			$this->template
				->set('title', 'Edit page')
				->set('data', $this->pages_m->as_array()->get($id))
				->set('layouts', $this->template->get_theme_layouts($this->setting->theme))
				->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		$this->pages_m->delete($id);
		redirect('admin/pages');
	}
}