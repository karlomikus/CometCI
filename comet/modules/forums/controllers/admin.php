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
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('forums_m');
		$this->load->model('labels/labels_m');

		$this->form_validation->set_rules('name', 'Forum name', 'required');
		$this->form_validation->set_rules('label', 'Label', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$name = $this->input->post('name');

			$data = array(
				'name' => $name,
				'label' => $this->input->post('label'),
				'date' => date('Y-m-d H:i:s'),
				'clan' => $this->input->post('clan'),
				'private' => $this->input->post('private'),
				'description' => $this->input->post('description')
			);

			$this->forums_m->insert_forum($data);
			$forumID = $this->db->insert_id();

			// Insert slug
			$slug = makePageSlug($forumID.'-'.$name);
			$dataSlug = array('slug' => $slug);
			$this->forums_m->update_forum($forumID, $dataSlug);

			// Insert mods
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

	public function edit($id = 0)
	{
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
				'clan' => $this->input->post('clan'),
				'private' => $this->input->post('private'),
				'description' => $this->input->post('description')
			);
			$this->forums_m->update_forum($id, $data);

			$mods = $this->input->post('mods');
			$this->forums_m->add_moderators($mods, $id);

			redirect('admin/forums');
		}
		else
		{
			$this->template
				->set('title', 'Edit forum')
				->set('data', $this->forums_m->get_forum($id))
				->set('labels', $this->labels_m->get_all())
				->set('users', $this->ion_auth->users()->result())
				->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		$this->load->model('forums_m');
		$this->groups_m->delete_forum($id);
		redirect('admin/forums');
	}
}

/* End of file admin.php */
/* Location: .//C/wamp/www/cms/comet/modules/forums/controllers/admin.php */