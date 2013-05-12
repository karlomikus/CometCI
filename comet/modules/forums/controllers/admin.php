<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function index()
	{
		$this->load->model('forums_m');

		//TODO: Make unlabeled forums only visible to admins with a warning to fix them

		$this->template
			->set('forums', $this->forums_m->get_forums())
			->set('title', 'Forums')
			->build('admin/main');
	}

	/**
	 * Creates forum
	 */
	public function create() {
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('forums_m');
		$this->load->model('labels/labels_m');

		$this->form_validation->set_rules('name', 'Forum name', 'required');
		$this->form_validation->set_rules('label', 'Label', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
				'name' => $this->input->post('name'),
				'label' => $this->input->post('label'),
				'date' => date('Y-m-d H:i:s'),
				'description' => $this->input->post('description')
			);
			$this->forums_m->insert_forum($data);
			$forumID = $this->db->insert_id();

			$mods = $this->input->post('mods');
			$this->forums_m->add_moderators($mods, $forumID);

			redirect('admin/forums');
		}
		else
		{
			$this->template
				->set('title', 'Create forum')
				->set('labels', $this->labels_m->get_all())
				->set('users', $this->ion_auth->users()->result())
				->build('admin/form');
		}
	}

}

/* End of file admin.php */
/* Location: .//C/wamp/www/cms/comet/modules/forums/controllers/admin.php */