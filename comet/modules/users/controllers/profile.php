<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Frontend_Controller {

	private $folder_path = './uploads/users/';

	function __construct()
	{
		parent::__construct();
		
		$this->template
			->set_layout(get_layout(__CLASS__));
	}

	public function index()
	{
		$option = false;
		if($this->ion_auth->logged_in()) $option = true;

		// Get currently logged in user data
		$page_user = $this->user;

		$this->template
			->set('data', $page_user)
			->set('is_loggedin', $option)
			->build('profile.twig');
	}

	public function edit($id = 0)
	{
		// Load required classes
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper('form');

		// Add missing functions to twig parser
		$this->parser->addFunction('form_open_multipart');
		$this->parser->addFunction('form_close');
		$this->parser->addFunction('validation_errors');

		// Set validation rules
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[2]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('dob', 'Date of birth', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');

		// Avatar file config
		$config['upload_path']   = $this->folder_path;
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$config['max_size']      = '1024';
		$config['max_width']     = '200';
		$config['max_height']    = '200';
		$config['file_name']     = $id;
		$this->upload->initialize($config);

		if($this->form_validation->run())
		{
			$data = array(
				'first_name' => $this->input->post('firstname'),
				'last_name' => $this->input->post('lastname'),
				'dob' => date('Y-m-d')
			);

			// Upload the avatar
			$current_avatar = $this->ion_auth->user($id)->row()->avatar;
			if ($this->upload->do_upload('avatar'))
			{
				// Delete the old avatar
				if(file_exists($this->folder_path.$current_avatar)) unlink($this->folder_path.$current_avatar);

				$file_data = $this->upload->data();
				unset($current_avatar);
			}
			else {
				$file_data = NULL;
			}

			// Check if avatar was indeed uploaded
			if(isset($file_data) and !empty($file_data['file_name'])) $data['avatar'] = $file_data['file_name'];
			else $data['avatar'] = $current_avatar;

			$this->ion_auth->update((int)$id, $data);
			redirect('users/profile/'.$id);
		}
		else
		{
			$this->template
				->set('data', $this->ion_auth->user($id)->row())
				->build('editprofile.twig');
		}		
	}
}