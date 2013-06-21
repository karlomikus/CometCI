<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends Frontend_Controller {

	private $redirect_to = '/';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		$this->redirect_to = $this->agent->referrer();
		
		$this->template
			->set_layout(get_layout(__CLASS__));
	}

	public function index()
	{
		redirect('users/profile');
	}

	public function login() 
	{
        $this->load->helper('form');

        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true)
        {
            $remember = TRUE;
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
                redirect($this->redirect_to);
            }
            else
            {
                $this->session->set_flashdata('login_alerts', 'Wrong username or password!');
                redirect($this->redirect_to);
            }
        }
        else
        {
        	$this->session->set_flashdata('login_alerts', 'Wrong username or password!');
            redirect($this->redirect_to);
        }
	}

	public function logout() 
	{
		$this->ion_auth->logout();
		redirect($this->redirect_to);
	}

	public function register() 
	{
		$this->parser->addFunction('validation_errors'); // Make it available in twig parser
		$this->parser->addFunction('set_value');
		$this->parser->addFunction('form_open');
		$this->parser->addFunction('form_close');

		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[password_repeat]');
		$this->form_validation->set_rules('password_repeat', 'Password repeat', 'required');

		if($this->form_validation->run()) {
			$username = strtolower($this->input->post('username'));
			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			if($this->ion_auth->register($username, $password, $email)) {
				$this->session->set_flashdata('login_alerts', 'Account created!');
				redirect($this->redirect_to);
			}
			else {
				$this->session->set_flashdata('login_alerts', 'Something went wrong!');
				redirect($this->redirect_to);
			}
		}
		else {
			$this->template
			->build('register.twig');
		}
	}

}

/* End of file users.php */
/* Location: ./comet/controllers/users.php */