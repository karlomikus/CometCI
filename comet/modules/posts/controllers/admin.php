<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/posts/';
	private $perPage = 15;

	public function __construct()
	{
		parent::__construct();

		$this->template->append_metadata(Assets::adminJs('ckeditor', 'js/ckeditor'));

		$this->load->model('posts_m');
	}
	
	public function index($sortBy = 'date', $sortOrder = 'desc', $page = 0)
	{
		$this->load->library('pagination');
		$count = $this->posts_m->count_all();

		if(isset($sortBy) && isset($sortOrder)) $this->posts_m->order_by($sortBy, $sortOrder);
		else $this->posts_m->order_by('date', 'desc');

		$config['base_url'] = base_url()."admin/posts/index/$sortBy/$sortOrder/";
		$config['total_rows'] = $count;
		$config['per_page'] = $this->perPage;
		$config['uri_segment'] = 6;

		$config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
		$config['next_link'] = '<i class="icon-angle-right"></i>';
		$config['prev_link'] = '<i class="icon-angle-left"></i>';
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$this->posts_m->limit($this->perPage, $page);

		$linkData->page = $page;
		$linkData->sortOrderLink = ($sortOrder == 'asc') ? 'desc' : 'asc';
		$linkData->currentOrder = $sortBy;

		$this->template
			->set('title', 'Posts')
			->set('posts', $this->posts_m->get_all())
			->set('linkdata', $linkData)
			->set('pagination', $this->pagination->create_links())
			->build('admin/main');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->helper('htmlpurifier');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Post title', 'required');
		$this->form_validation->set_rules('body', 'Post Content', 'required');
		$this->form_validation->set_rules('label', 'Post label', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$title = $this->input->post('title');
			$slug  = makePageSlug($title);

			$data = array(
				'title' => $title,
				'body' => html_purify($this->input->post('body'), 'wysiwyg'),
				'date' => date('Y-m-d H:i:s'),
				'teaser' => $this->input->post('teaser'),
				'author' => $this->user->user_id,
				'label' => $this->input->post('label'),
				'featured' => $this->input->post('featured'),
				'clan' => $this->input->post('clan'),
				'slug' => $slug,
				'state' => $this->input->post('state') // 1 - Publish now, 0 - Draft
			);    

			$this->posts_m->insert($data);
			redirect('admin/posts');
		}
		else
		{
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
		$this->load->helper('htmlpurifier');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Post title', 'required');
		$this->form_validation->set_rules('body', 'Post Content', 'required');
		$this->form_validation->set_rules('label', 'Post label', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
				'title' => $this->input->post('title'),
				'body' => html_purify($this->input->post('body'), 'wysiwyg'),
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
		else
		{
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
		$this->posts_m->delete_post_comments($id);

		redirect('admin/posts');
	}
}