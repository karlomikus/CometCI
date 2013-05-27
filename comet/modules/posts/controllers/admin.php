<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/posts/';

	public function __construct()
	{
		parent::__construct();

		$this->load->model('posts_m');
	}

	public function index($page = 0, $sortBy = NULL, $sortOrder = NULL)
	{
		$this->load->library('pagination');
		$count = $this->posts_m->count_all();

		if(isset($sortBy) && isset($sortOrder)) $this->posts_m->order_by($sortBy, $sortOrder);
		else $this->posts_m->order_by('date', 'desc');

		$config['base_url'] = base_url().'admin/posts/index/';
		$config['total_rows'] = $count;
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;

		$this->posts_m->limit(15, $page);

		$this->pagination->initialize($config);

		$this->template
			->set('title', 'Posts')
			->set('posts', $this->posts_m->get_all())
			->set('pagination', $this->pagination->create_links())
			->build('admin/main');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Post title', 'required');
		$this->form_validation->set_rules('body', 'Post Content', 'required');
		$this->form_validation->set_rules('label', 'Post label', 'required');

		if ($this->form_validation->run() == TRUE) {

			$this->load->helper('htmlpurifier');
			$clean_html = html_purify($this->input->post('body'), 'wysiwyg');
			
			$data = array(
				'title' => $this->input->post('title'),
				'body' => $clean_html,
				'date' => date('Y-m-d H:i:s'),
				'teaser' => $this->input->post('teaser'),
				'author' => $this->user->user_id,
				'label' => $this->input->post('label'),
				'featured' => $this->input->post('featured'),
				'clan' => $this->input->post('clan'),
				'state' => $this->input->post('state') // 1 - Publish now, 0 - Draft
			);    

			$this->posts_m->insert($data);
			redirect('admin/posts');
		}
		else {
			$this->load->model('labels/labels_m');
			$this->template
				->set('labels', $this->labels_m->get_all())
				->set('title', 'Create post')
				->build('admin/form');
		}
	}

	public function edit($id = 0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Post title', 'required');
		$this->form_validation->set_rules('body', 'Post Content', 'required');
		$this->form_validation->set_rules('label', 'Post label', 'required');

		if ($this->form_validation->run() == TRUE) {

			$this->load->helper('htmlpurifier');
			$clean_html = html_purify($this->input->post('body'));

			$data = array(
				'title' => $this->input->post('title'),
				'body' => $clean_html,
				'date' => date('Y-m-d H:i:s'),
				'teaser' => $this->input->post('teaser'),
				'author' => $this->user->user_id,
				'label' => $this->input->post('label'),
				'featured' => $this->input->post('featured'),
				'clan' => $this->input->post('clan'),
				'state' => $this->input->post('state') // 1 - Publish now, 0 - Draft
			);  

			$this->posts_m->update($id, $data);
			redirect('admin/posts');
		}
		else {
			$this->load->model('labels/labels_m');
			$this->template
				->set('title', 'Edit post')
				->set('data', $this->posts_m->as_array()->get($id))
				->set('labels', $this->labels_m->get_all())
				->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		$this->posts_m->delete($id);

		redirect('admin/posts');
	}
}