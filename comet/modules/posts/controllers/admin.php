<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/posts/';

	private $template_data = array(
		'title' => 'Posts',
		'create_title' => 'Add post',
		'edit_title' => 'Edit post',
		'add_button' => 'Add post'
	);

	public function __construct() {
		parent::__construct();
		$this->load->model('posts_m');
	}

	public function index($sortBy = NULL, $sortOrder = NULL) {
		if(isset($sortBy) && isset($sortOrder)) $this->posts_m->order_by($sortBy, $sortOrder);

		$this->template
			->set($this->template_data)
			->set('posts', $this->posts_m->get_all())
			->build('admin/main');
	}

	public function create() {

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
				->set('title', $this->template_data['create_title'])
				->build('admin/form');
		}
	}

	public function edit($id = 0) {

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
				->set('title', $this->template_data['edit_title'])
				->set('data', $this->posts_m->as_array()->get($id))
				->set('labels', $this->labels_m->get_all())
				->build('admin/form');
		}
	}

	public function delete($id = 0) {
		$this->posts_m->delete($id);
		redirect('admin/posts');
	}
}