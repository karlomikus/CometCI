<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Frontend_Controller {

	private $folder_path = './uploads/users/';

	function __construct()
	{
		parent::__construct();
		
		$this->template
			->set_layout(get_layout(__CLASS__));
	}

	public function index($id = '')
	{
		$option = FALSE;
		if($this->ion_auth->logged_in()) $option = TRUE;

		if(empty($id)) $page_user = $this->user;
		else $page_user = $this->ion_auth->user($id)->row();

		$this->template
			->set('userdata', $page_user)
			->set('is_loggedin', $option)
			->build('profile.twig');
	}

	public function edit($id = 0)
	{
		// TODO: Error messages!
		
		// Load required classes
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper('form');

		// Add missing functions to twig parser
		$this->parser->checkFunctions();

		// Set validation rules
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[2]|max_length[20]');
		$this->form_validation->set_rules('dob', 'Date of birth', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');

		// Avatar file config
		$config['upload_path']   = $this->folder_path;
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$config['max_size']      = '1024';
		$config['max_width']     = '200';
		$config['max_height']    = '400';
		$config['file_name']     = $id;
		$this->upload->initialize($config);

		if($this->form_validation->run())
		{
			$dateDobPosted = $this->input->post('dob', TRUE);    
			$dateDob = date('Y-m-d', strtotime($dateDobPosted));

			$data = array(
				'first_name' => $this->input->post('firstname', TRUE),
				'last_name' => $this->input->post('lastname', TRUE),
				'dob' => $dateDob,
				'gender' => $this->input->post('gender'),
				'about' => $this->input->post('aboutme', TRUE),
				'country' => $this->input->post('country')
			);

			// Upload the avatar
			$current_avatar = $this->ion_auth->user($id)->row()->avatar;
			if ($this->upload->do_upload('avatar'))
			{
				if(file_exists($this->folder_path.$current_avatar)) unlink($this->folder_path.$current_avatar);

				$file_data = $this->upload->data();
				unset($current_avatar);
			}
			else $file_data = NULL;

			// Check if avatar was indeed uploaded
			if(isset($file_data) and !empty($file_data['file_name'])) $data['avatar'] = $file_data['file_name'];
			else $data['avatar'] = $current_avatar;

			// Process account changes
			if($this->input->post('newpassword') || $this->input->post('newmail'))
			{
				$currentPassword = $this->input->post('password', TRUE);
				if(!isset($currentPassword)) redirect('profile/'.$id);

				$username = get_username($id);

				// Password change
				if($this->input->post('newpassword'))
				{
					$newPassword = $this->input->post('newpassword', TRUE);
					$newPasswordRepeat = $this->input->post('newpasswordrepeat', TRUE);

					if($newPassword == $newPasswordRepeat)
					{
						 $this->ion_auth->change_password($username, $currentPassword, $newPassword);
					}
					else
					{
						// Error
					}
				}
			}

			// Update!
			$this->ion_auth->update((int)$id, $data);
			redirect('profile/'.$id);
		}
		else
		{
			$this->template
				->set('data', $this->ion_auth->user($id)->row())
				->build('editprofile.twig');
		}		
	}
}