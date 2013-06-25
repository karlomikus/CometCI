<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/banners/';

	public function __construct()
	{
		parent::__construct();

		$this->load->model('banners_m');
	}

	public function index()
	{
		$this->load->helper('text');
		$this->banners_m->order_by('name', 'asc');

		$this->template
			->set('title', 'Banners')
			->set('banners', $this->banners_m->get_all())
			->build('admin/main');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper('htmlpurifier');

		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[20]|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('url', 'Banner URL', 'trim|required|htmlspecialchars|prep_url|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			$next_id = $this->banners_m->get_next_id();

			if (!empty($_FILES['image']['name']))
			{
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '0';
				$config['max_height']    = '0';
				$config['file_name']     = $next_id;
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image'))
				{
					$file_data = $this->upload->data();
				}
				else
				{
					$this->session->set_flashdata('create_error', $this->upload->display_errors('', ''));
                	$file_data = NULL;
				}
			}

			$data = array(
				'name' => $this->input->post('name'),
				'width' => $this->input->post('width', TRUE),
				'height' => $this->input->post('height', TRUE),
				'url' => urlencode($this->input->post('url')),
				'date' => date('Y-m-d H:i:s'),
				'description' => html_purify($this->input->post('description'), 'description'),
				'code' => $this->input->post('code', TRUE),
				'image' => $file_data['file_name']
			);

			$this->banners_m->insert($data);
			redirect('admin/banners');
		}
		else
		{
			$this->template
				->set('title', 'Create banner')
				->build('admin/form');
		}
	}

	public function edit($id = 0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper('htmlpurifier');

		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[20]|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('url', 'Banner URL', 'trim|required|htmlspecialchars|prep_url|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			if (!empty($_FILES['image']['name']))
			{
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '0';
				$config['max_height']    = '0';
				$config['file_name']     = $id;
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image'))
				{
					$file_data = $this->upload->data();
				}
				else {
					$this->session->set_flashdata('create_error', $this->upload->display_errors('', ''));
                	$file_data = NULL;
				}
			}

			// Found new file delete the old one
			$fileBanner = $this->banners_m->get($id)->image;
			if(!empty($file_data))
			{
				unlink($this->folder_path.$fileBanner);
				$fileBanner = $file_data['file_name'];
			}
			
			$data = array(
				'name' => $this->input->post('name'),
				'width' => $this->input->post('width', TRUE),
				'height' => $this->input->post('height', TRUE),
				'url' => urlencode($this->input->post('url')),
				'date' => date('Y-m-d H:i:s'),
				'description' => html_purify($this->input->post('description'), 'description'),
				'code' => $this->input->post('code', TRUE),
				'image' => $fileBanner
			);

			$this->banners_m->update($id, $data);
			redirect('admin/banners');
		}
		else
		{
			$this->template
				->set('title', 'Edit banner')
				->set('data', $this->banners_m->as_array()->get($id))
				->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		$banner = $this->banners_m->get($id);
		$image = $this->folder_path.$banner->banner;

		unlink($image);
		$this->banners_m->delete($id);

		redirect('admin/banners');
	}
}