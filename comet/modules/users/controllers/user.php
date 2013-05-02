<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Frontend_Controller {

	public function index()
	{
		echo 'safas';
	}

	public function login() {

        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true)
        {
            $remember = TRUE;

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
                redirect('/');
            }
            else
            {
                $this->session->set_flashdata('login_error', 'Wrong username or password!');
                redirect('admin/login', 'refresh');
            }
        }
        else
        {
        	$this->session->set_flashdata('login_error', 'Wrong username or password!');
            redirect('/');
        }

    }

}

/* End of file user.php */
/* Location: .//C/wamp/www/cms/comet/modules/users/controllers/user.php */