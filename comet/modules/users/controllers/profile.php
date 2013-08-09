<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Frontend_Controller {

	private $folder_path = './uploads/users/';

	function __construct()
	{
		parent::__construct();
		
		$this->template
			->set_layout(get_layout('users')); // We need users since profile module does not exist
	}

	public function index($id = '')
	{
		if(empty($id)) $id = $this->user->id;

		$page_user = $this->ion_auth->user($id)->row();

		$option = FALSE;
		if($this->ion_auth->logged_in() && $this->user->id == $id) $option = TRUE;

		$this->template
			->set('userdata', $page_user)
			->set('is_loggedin', $option)
			->build('profile.twig');
	}

	public function edit($id = 0)
	{
		if($this->user->id != $id) redirect('profile/'.$id);

		// Status messages
		$messages = array();
		
		// Load required classes
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper('form');
		$this->load->helper('htmlpurifier');

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
				'about' => html_purify($this->input->post('aboutme'), 'comment'),
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
			else
			{
				$file_data = NULL;
				$messages[] = $this->upload->display_errors();
			}

			// Check if avatar was indeed uploaded
			if(isset($file_data) and !empty($file_data['file_name'])) $data['avatar'] = $file_data['file_name'];
			else $data['avatar'] = $current_avatar;

			// Process account changes
			if($this->input->post('newpassword') || $this->input->post('newmail'))
			{
				$currentPassword = $this->input->post('password', TRUE);
				if(!isset($currentPassword)) redirect('profile/'.$id);

				$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

				// Password change
				if($this->input->post('newpassword'))
				{
					$newPassword = $this->input->post('newpassword', TRUE);

					if($this->ion_auth->change_password($identity, $currentPassword, $newPassword))
						$messages[] = 'Password change successful!';
					else
						$messages[] = $this->ion_auth->errors();
				}

				// Email change
				if($this->input->post('newmail'))
				{
					$this->load->helper('email');
					$newMail = $this->input->post('newmail', TRUE);

					if($this->ion_auth->hash_password_db($id, $currentPassword) && valid_email($newMail))
					{
						$data['email'] = $newMail;
						$messages[] = 'Email change successful!';
					}
					else
						$messages[] = 'Unable to change email';
				}
			}

			$this->session->set_flashdata('profilemsgs', $messages);

			// Update!
			$this->ion_auth->update((int)$id, $data);
			redirect('profile/'.$id);
		}
		else
		{
			$this->template
				->set('data', $this->ion_auth->user($id)->row())
				->set('messages', $this->session->flashdata('profilemsgs'))
				->build('editprofile.twig');
		}		
	}
}