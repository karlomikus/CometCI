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
		$this->load->library('form_validation');

		$this->template->append_metadata(Assets::adminJs('ckeditor', 'js/ckeditor'));

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('slug', 'Page slug', 'required|max_length[25]|min_length[3]|is_unique[pages.slug]');
		$this->form_validation->set_rules('access', 'Access level', 'required');
		$this->form_validation->set_rules('navigation', 'Navigation link name', 'trim|required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'slug' => makePageSlug($this->input->post('slug')),
				'content' => $this->input->post('content'),
				'navigation' => $this->input->post('navigation'),
				'layout' => $this->input->post('layout'),
				'date' => date('Y-m-d H:i'),
				'access' => $this->input->post('access')
			);

			$this->pages_m->insert($data);
			redirect('admin/pages');
		}
		else
		{
			$this->template
				->set('title', 'Create page')
				->set('layouts', $this->template->get_theme_layouts('default'))
				->build('admin/form');
		}
	}

	public function edit($id = 0) {

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->template->append_metadata(Assets::adminJs('ckeditor', 'js/ckeditor'));

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('slug', 'Page slug', 'required|max_length[25]|min_length[3]');
		$this->form_validation->set_rules('access', 'Access level', 'required');
		$this->form_validation->set_rules('navigation', 'Navigation link name', 'trim|required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'slug' => makePageSlug($this->input->post('slug')),
				'content' => $this->input->post('content'),
				'navigation' => $this->input->post('navigation'),
				'layout' => $this->input->post('layout'),
				'date' => date('Y-m-d H:i'),
				'access' => $this->input->post('access')
			);

			$this->pages_m->update($id, $data);
			redirect('admin/pages');
		}
		else
		{
			$this->template
				->set('title', 'Edit page')
				->set('data', $this->pages_m->as_array()->get($id))
				->set('layouts', $this->template->get_theme_layouts('default'))
				->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		$this->pages_m->delete($id);
		redirect('admin/pages');
	}
}