<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends Frontend_Controller {

	public function add($module = '', $module_link) {
		$this->load->model('comments_m');
		$this->load->helper('htmlpurifier');

		$data = array(
			'content' => html_purify($this->input->post('content')),
			'poster_id' => $this->user->id,
			'module' => $module,
			'module_link' => $module_link
		);
		$this->comments_m->insert($data);
		redirect($module.'/show/'.$module_link);
	}
}