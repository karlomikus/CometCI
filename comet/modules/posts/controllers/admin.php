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

		$config = $this->config->item('pagination_backend');
		$config['base_url'] = base_url()."admin/posts/index/$sortBy/$sortOrder/";
		$config['total_rows'] = $count;
		$config['per_page'] = $this->perPage;
		$config['uri_segment'] = 6;

		$this->pagination->initialize($config);
		$this->posts_m->limit($this->perPage, $page);

		$linkData = new stdClass();
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
		$this->load->library('upload');

		if ($this->form_validation->run('posts') == TRUE)
		{
			$next_id = $this->posts_m->get_next_id();
			$title = $this->input->post('title');
			$slug  = makePageSlug($title);
			$file_data = NULL;

			if (!empty($_FILES['userfile']['name']))
			{
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '0';
				$config['max_height']    = '0';
				$config['file_name']     = $next_id;
				$this->upload->initialize($config);

				if($this->upload->do_upload('userfile')) $file_data = $this->upload->data();
				else $this->session->set_flashdata('create_error', $this->upload->display_errors('', ''));
			}

			$data = array(
				'title' => $title,
				'body' => html_purify($this->input->post('body'), 'wysiwyg'),
				'date' => date('Y-m-d H:i:s'),
				'teaser' => html_purify($this->input->post('teaser'), 'description'),
				'author' => $this->user->user_id,
				'label' => $this->input->post('label'),
				'image' => $file_data['file_name'],
				'featured' => $this->input->post('featured'),
				'clan' => $this->input->post('clan'),
				'slug' => $slug,
				'state' => $this->input->post('state')
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
		$this->load->library('upload');

		if ($this->form_validation->run('posts') == TRUE)
		{
			if (!empty($_FILES['userfile']['name']))
			{
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '0';
				$config['max_height']    = '0';
				$config['file_name']     = $id;
				$this->upload->initialize($config);

				if ($this->upload->do_upload('userfile'))
				{
					$file_data = $this->upload->data();
				}
				else {
					$this->session->set_flashdata('create_error', $this->upload->display_errors('', ''));
                	$file_data = NULL;
				}
			}

			// Found new file delete the old one
			$fileBanner = $this->posts_m->get($id)->image;
			if(!empty($file_data))
			{
				unlink($this->folder_path.$fileBanner);
				$fileBanner = $file_data['file_name'];
			}

			$data = array(
				'title' => $this->input->post('title'),
				'body' => html_purify($this->input->post('body'), 'wysiwyg'),
				'date' => date('Y-m-d H:i:s'),
				'teaser' => html_purify($this->input->post('teaser'), 'description'),
				'image' => $fileBanner,
				'label' => $this->input->post('label'),
				'featured' => $this->input->post('featured'),
				'clan' => $this->input->post('clan'),
				'state' => $this->input->post('state')
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
		$post = $this->posts_m->get($id);
		$fpath_image = $this->folder_path.$post->image;
		unlink($fpath_image);

		$this->posts_m->delete($id);
		$this->posts_m->delete_post_comments($id);

		redirect('admin/posts');
	}
}