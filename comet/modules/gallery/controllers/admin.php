<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/';

	public function __construct()
	{
		parent::__construct();

		$this->load->model('gallery_m');
	}

	public function index()
	{
		$this->load->helper('text');

		$this->template
			->set('title', 'Galleries')
			->set('galleries', $this->gallery_m->get_all())
			->build('admin/main');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->form_validation->set_rules('name', 'Gallery name', 'required|min_length[5]');

		if($this->form_validation->run())
		{
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'access' => $this->input->post('access'),
				'date' => date('Y-m-d H:i:s')
			);

			$this->gallery_m->insert($data);
			redirect('admin/gallery');
		}
		else
		{
			$this->template
				->set('title', 'Create a gallery')
				->build('admin/form');
		}
	}

	public function edit($galleryID = 0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->form_validation->set_rules('name', 'Gallery name', 'required|min_length[5]');

		if($this->form_validation->run())
		{
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'access' => $this->input->post('access'),
				'date' => date('Y-m-d H:i:s')
			);

			$this->gallery_m->update($galleryID, $data);
			redirect('admin/gallery');
		}
		else
		{
			$this->template
				->set('title', 'Create a gallery')
				->set('data', $this->gallery_m->as_array()->get($galleryID))
				->build('admin/form');
		}
	}

	public function images($galleryID = 0)
	{
		$this->load->model('gallery_files_m');

		$this->template
			->set('title', 'Edit images in gallery')
			->set('data', $this->gallery_files_m->get_many_by('gallery', $galleryID))
			->build('admin/images');
	}

	public function upload()
	{
		if (!$this->input->is_ajax_request()) redirect('admin/gallery'); // Wot u think u doin m8

		$config['upload_path']   = $this->folder_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['max_width']     = '0';
		$config['max_height']    = '0';

		$this->load->model('gallery_files_m');
		$this->load->library('upload');
		$this->upload->initialize($config);

		$message = '';
		$data = NULL;

		if(isset($_FILES['images']))
		{
			$files = $_FILES;
			$cpt = count($_FILES['images']['name']);

			for($i = 0; $i < $cpt; $i++)
			{
				$_FILES['images']['name'] 		= $files['images']['name'][$i];
				$_FILES['images']['type']		= $files['images']['type'][$i];
				$_FILES['images']['tmp_name']	= $files['images']['tmp_name'][$i];
				$_FILES['images']['error']		= $files['images']['error'][$i];
				$_FILES['images']['size']		= $files['images']['size'][$i];

				if ($this->upload->do_upload('images'))
				{
					$file_data = $this->upload->data();
				}
				else
				{
					$message = $this->upload->display_errors('', '');
                	$file_data = NULL;
				}

				if(!empty($file_data))
				{
					$data[] = array(
						'gallery' => 1,
						'file' => $file_data['file_name'],
						'title' => 'Title',
						'description' => 'Description'
					);
				}
			}

			$this->gallery_files_m->insert_many($data);
			$message = 'Success!';
		}

		echo $message;
		unset($data);
		unset($files);
	}
}