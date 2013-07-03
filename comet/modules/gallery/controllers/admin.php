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

		$this->form_validation->set_rules('name', 'Gallery name', 'required|trim|htmlspecialchars|min_length[5]|xss_clean');

		if($this->form_validation->run())
		{
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description', TRUE),
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

		$this->form_validation->set_rules('name', 'Gallery name', 'required|trim|htmlspecialchars|min_length[5]|xss_clean');

		if($this->form_validation->run())
		{
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description', TRUE),
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
		$this->load->library('upload');
		$this->load->library('form_validation');

		$config['upload_path']   = $this->folder_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['max_width']     = '0';
		$config['max_height']    = '0';

		$file_data = NULL;
		$data = NULL;

		$this->form_validation->set_rules('width', 'Width', 'numeric|xss_clean|trim');
		$this->form_validation->set_rules('height', 'Height', 'numeric|xss_clean|trim');

		if($this->form_validation->run() == TRUE)
		{
			// Make a nice array
			$_FILES = $this->multiple($_FILES);
			$files = $_FILES;

			// Check if user selected images
			if(isset($_FILES['images']))
			{
				// Go through the array
				foreach ($_FILES['images'] as $key => $value)
				{
					// Create a new _FILES array which CI can process
					$_FILES['images'] = $files['images'][$key];
					$this->upload->initialize($config);

					// Save file data
					if ($this->upload->do_upload('images')) $file_data = $this->upload->data();

					if(!empty($file_data))
					{
						if($this->input->post('resize') == 1)
						{
							$newWidth = $this->input->post('width');
							$newHeight = $this->input->post('height');

							if(!empty($newWidth) && !empty($newHeight))
							{
								$newWidth = intval($newWidth);
								$newHeight = intval($newHeight);
							}

							$image_config["image_library"] = "gd2";
							$image_config["source_image"] = $file_data["full_path"];
							$image_config['create_thumb'] = FALSE;
							$image_config['maintain_ratio'] = TRUE;
							$image_config['new_image'] = $file_data["file_path"];
							$image_config['quality'] = "100%";
							$image_config['width'] = $newWidth;
							$image_config['height'] = $newHeight;
							 
							$this->load->library('image_lib');
							$this->image_lib->initialize($image_config);

							$this->image_lib->resize();
						}

						$data[] = array(
							'gallery' => $galleryID,
							'file' => $file_data['file_name'],
							'title' => 'Title',
							'description' => 'Description'
						);
					}
				}

				$this->gallery_files_m->insert_many($data);
				redirect('admin/gallery/images/'.$galleryID);
			}
		}

		$this->template
			->set('title', 'Edit images in gallery')
			->set('id', $galleryID)
			->set('data', $this->gallery_files_m->get_many_by('gallery', $galleryID))
			->build('admin/images');
	}

	public function update($id = 0)
	{
		$this->load->model('gallery_files_m', 'images');

		$imagesDelete = $this->input->post('todelete', TRUE);
		$imagesUpdate = $this->input->post('toupdate', TRUE);

		// Delete action
		if(!empty($imagesDelete) && is_array($imagesDelete))
		{
			foreach ($imagesDelete as $fileID)
			{
				$filename = $this->images->get_by('id', $fileID)->file;
				unlink($this->folder_path.$filename);
				$this->images->delete($fileID);
			}
		}

		// Rename action
		if(!empty($imagesUpdate) && is_array($imagesUpdate))
		{
			foreach ($imagesUpdate as $imageID => $title)
			{
				$data = array('title' => $title);
				$this->images->update($imageID, $data);
			}
		}

		redirect('admin/gallery/images/'.$id);
	}

	public function delete($id = 0)
	{
		// TODO: Delete gallery images
		$this->gallery_m->delete($id);
		redirect('admin/gallery');
	}

	private function multiple(array $_files, $top = TRUE)
	{
	    $files = array();
	    foreach($_files as $name=>$file){
	        if($top) $sub_name = $file['name'];
	        else    $sub_name = $name;
	       
	        if(is_array($sub_name)){
	            foreach(array_keys($sub_name) as $key){
	                $files[$name][$key] = array(
	                    'name'     => $file['name'][$key],
	                    'type'     => $file['type'][$key],
	                    'tmp_name' => $file['tmp_name'][$key],
	                    'error'    => $file['error'][$key],
	                    'size'     => $file['size'][$key],
	                );
	                $files[$name] = $this->multiple($files[$name], FALSE);
	            }
	        }else{
	            $files[$name] = $file;
	        }
	    }
	    return $files;
	}
}