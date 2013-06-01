<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends Frontend_Controller {

	/**
	 * Processes comment data and inserts it
	 * into the database
	 * 
	 * @param string $module      Name of the module
	 * @param string $module_link Link from where comment was called
	 */
	public function add($module, $module_link)
	{
		$this->load->library('form_validation');
		$this->load->model('comments_m');
		$this->load->helper('htmlpurifier');

		$this->form_validation->set_rules('content', 'Comment content', 'trim|required|min_length[5]|xss_clean');
		// TODO: Honey pot method for fighting spam
		if($this->ion_auth->logged_in() && $this->form_validation->run()) 
		{
			$data = array(
				'content' => html_purify($this->input->post('content'), 'comment'),
				'poster_id' => $this->user->id,
				'module' => $module,
				'module_link' => $module_link,
				'date' => date('Y-m-d H:i:s')
			);
			$this->comments_m->insert($data);
			redirect($module.'/show/'.$module_link);
		}
		else 
		{
			redirect($module.'/show/'.$module_link);
		}
	}

	/**
	 * Delete comment based on comment ID
	 * @param  integer $id Comment ID
	 */
	public function delete($id = 0)
	{
		$this->load->library('user_agent');

		if($this->ion_auth->logged_in())
		{
			$comment_data = $this->comments_m->get($id);

			// User is author or is admin
			if($comment_data->poster_id == $user->user_id || $this->ion_auth->is_admin()) 
			{
				$this->comments_m->delete($id);

				// Send them back to the previous url
				if($this->agent->is_referral())
				{
					redirect($this->agent->referrer()); 
				}
				else 
				{
					redirect('/');
				}
			}
		}
		redirect('/');
	}
}