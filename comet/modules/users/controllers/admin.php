<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $perPage = 15;

	public function index($page = 0)
	{
		$this->load->model('users_m');
		$this->load->library('pagination');

		$count = $this->users_m->count_all();
		$config = $this->config->item('pagination_backend');
		$config['base_url'] = base_url()."admin/users/index/";
		$config['total_rows'] = $count;
		$config['per_page'] = $this->perPage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$this->users_m->limit($this->perPage, $page);
		$this->users_m->order_by('username', 'asc');

		$data['users'] = $this->ion_auth->users()->result();
		foreach ($data['users'] as $k => $user)
		{
			$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		}

		$this->template
			->set('title', 'Users')
			->set('pagination', $this->pagination->create_links())
			->set('total', $count)
			->build('admin/main', $data);
	}

	public function create()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('username', 'Username', 'required|trim|htmlspecialchars|min_length[4]|max_length[16]|is_unique[users.username]|strtolower|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[16]|matches[password_confirm]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|htmlspecialchars|xss_clean');

		if ($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			$groups   = $this->input->post('groups');
		}		

		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, '', $groups))
		{
			redirect('admin/users');
		}
		else
		{
			$this->template
				->set('title', 'Create User')
				->set('groups', $this->ion_auth->groups()->result())
				->build('admin/form');
		}
	}

	public function edit($id = 0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required|trim|htmlspecialchars|min_length[4]|max_length[16]|is_unique[users.username]|strtolower|xss_clean');
		
		if (isset($_POST) && !empty($_POST))
		{
			$data = array(
				'username' => strtolower($this->input->post('username', true)),
				'email' => $this->input->post('email')
			);

			// Update groups
			$groups = $this->input->post('groups');
			if (isset($groups) && !empty($groups))
			{
				$this->ion_auth->remove_from_group('', $id);
				foreach ($groups as $grp)
				{
					$this->ion_auth->add_to_group($grp, $id);
				}
			}

			// Update password
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[10]|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
				$data['password'] = $this->input->post('password');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$this->ion_auth->update($id, $data);
				redirect('admin/users');
			}
		}

		$this->template
			->set('title', 'Edit user')
			->set('userdata', $this->ion_auth->user($id)->row_array())
			->set('groups', $this->ion_auth->groups()->result())
			->set('current_groups', $this->ion_auth->get_users_groups($id)->result())
			->build('admin/form');
	}

	public function delete($id = 0)
	{
		//if($this->ion_auth->delete_user($id)) redirect('admin/users');
		redirect('admin/users');		
	}

	public function status($userID)
	{
		if($userID == 1 || empty($userID)) redirect('admin/users');

		$this->load->model('users_m');
		$query = $this->users_m->get($userID);

		if($query->active == 0)
		{
			$data = array('active' => 1);
			$this->users_m->update($userID, $data);
		}
		else
		{
			$data = array('active' => 0);
			$this->users_m->update($userID, $data);
		}

		redirect('admin/users');
	}
}