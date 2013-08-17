<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->ion_auth->logged_in()) redirect();

		$this->load->model('messages_m', 'msg');
		$this->template
			->set_layout(get_layout(__CLASS__));
	}

	public function index($category = 'received')
	{
		$this->load->helper('text');

		$currentID = $this->user->id;
		$this->msg->order_by('date', 'desc');

		$this->msg->update_view_status($currentID);

		if($category == 'received') $data = $this->msg->get_many_by('to', $currentID);
		elseif($category == 'sent') $data = $this->msg->get_many_by('from', $currentID);
		else 						$data = $this->msg->get_many_by('to', $currentID);

		$this->template
			->set('data', $data)
			->build('main.twig');
	}

	public function create($sendtoID = 0)
	{
		$this->load->helper('form');
		$this->load->helper('htmlpurifier');
		$this->load->library('form_validation');

		$this->parser->checkFunctions();

		$this->form_validation->set_rules('title', 'Title', 'required|min_length[4]|trim|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('content', 'Content', 'required|min_length[4]|htmlspecialchars');
		$this->form_validation->set_rules('sendto', 'Send to', 'required|trim|htmlspecialchars|xss_clean');
		// TODO: Check username validation

		if ($this->form_validation->run() == TRUE)
		{
			if(empty($sendtoID)) $sendtoID = get_user_id($this->input->post('sendto'));

			$data = array(
				'title' => $this->input->post('title'),
				'content' => html_purify($this->input->post('content'), 'description'),
				'to' => $sendtoID,
				'from' => $this->user->id,
				'date' => date('Y-m-d H:i:s')
			);

			$this->msg->insert($data);
			redirect('messages');
		}
		else
		{
			$this->load->model('users/users_m');
			$users = $this->users_m->get_all();

			$this->template
				->set('users', $users)
				->build('form.twig');
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