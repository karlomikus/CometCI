<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/labels/';

	public function __construct()
	{
		parent::__construct();

		$this->load->model('labels_m');
	}

	public function index()
	{
		$this->load->helper('text');
		$this->labels_m->order_by('name', 'asc');

		$this->template
			->set('title', 'Labels')
			->set('labels', $this->labels_m->get_all())
			->build('admin/main');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->form_validation->set_rules('title', 'Title', 'required|htmlspecialchars|trim|min_length[4]|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			$next_id = $this->labels_m->get_next_id();

			if (!empty($_FILES['banner']['name']))
			{
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '1000';
				$config['max_height']    = '1000';
				$config['file_name']     = $next_id;
				$this->upload->initialize($config);

				if ($this->upload->do_upload('banner'))
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
				'name' => $this->input->post('title'),
				'description' => $this->input->post('description', TRUE),
				'banner' => $file_data['file_name']
			);

			$this->labels_m->insert($data);
			redirect('admin/labels');
		}
		else
		{
			$this->template
				->set('title', 'Create label')
				->build('admin/form');
		}
	}

	public function edit($id = 0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->form_validation->set_rules('title', 'Title', 'required|min_length[4]|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			if (!empty($_FILES['banner']['name']))
			{
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '1000';
				$config['max_height']    = '1000';
				$config['file_name']     = $id;
				$this->upload->initialize($config);

				if ($this->upload->do_upload('banner'))
				{
					$file_data = $this->upload->data();
				}
				else {
					$this->session->set_flashdata('create_error', $this->upload->display_errors('', ''));
                	$file_data = NULL;
				}
			}

			// Found new file delete the old one
			$fileBanner = $this->labels_m->get($id)->banner;
			if(!empty($file_data))
			{
				unlink($this->folder_path.$fileBanner);
				$fileBanner = $file_data['file_name'];
			}
			
			$data = array(
				'name' => $this->input->post('title'),
				'description' => $this->input->post('description', TRUE),
				'banner' => $fileBanner
			);

			$this->labels_m->update($id, $data);
			redirect('admin/labels');
		}
		else
		{
			$this->template
				->set('title', 'Edit label')
				->set('data', $this->labels_m->as_array()->get($id))
				->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		$label = $this->labels_m->get($id);
		$filepath_banner = $this->folder_path.$label->banner;

		unlink($filepath_banner);
		$this->labels_m->delete($id);

		redirect('admin/labels');
	}
}