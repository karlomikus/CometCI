<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $perPage = 10;

	public function index($page = 0)
	{
		$this->load->model('users_m');
		$this->load->library('pagination');

		$count = $this->users_m->count_all();

		$config['base_url'] = base_url()."admin/users/index/";
		$config['total_rows'] = $count;
		$config['per_page'] = $this->perPage;
		$config['uri_segment'] = 4;

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

		$this->users_m->limit($this->perPage, $page);

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

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[10]|matches[password_confirm]');

		if ($this->form_validation->run()) {
			$username = strtolower($this->input->post('username'));
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			$groups = $this->input->post('groups');
		}		

		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, '', $groups)) {
			redirect('admin/users');
		}
		else {
			$groups = $this->ion_auth->groups()->result();

			$this->template
				->set('title', 'Create User')
				->set('groups', $groups)
				->build('admin/form');
		}
	}

	public function edit($id = 0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		
		if (isset($_POST) && !empty($_POST)) {
			$data = array(
				'username' => strtolower($this->input->post('username')),
				'email' => $this->input->post('email')
			);

			$groups = $this->input->post('groups');
			// Update groups
			if (isset($groups) && !empty($groups)) {
				$this->ion_auth->remove_from_group('', $id);
				foreach ($groups as $grp) {
					$this->ion_auth->add_to_group($grp, $id);
				}
			}

			// Update password
			if ($this->input->post('password')) {
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[10]|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
				$data['password'] = $this->input->post('password');
			}

			if ($this->form_validation->run() === TRUE) {
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
		if($this->ion_auth->delete_user($id)) redirect('admin/users');
		else echo 'Delete failed';		
	}

	public function activate($id = 0, $code = FALSE)
	{
		if ($code !== FALSE) {
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin()) {
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation) {
			redirect('admin/users');
		}
		else {
			redirect('users/forgot_password');
		}
	}

	function deactivate($id = 0)
	{
		$this->ion_auth->deactivate($id);
		redirect('admin/users');
	}
}