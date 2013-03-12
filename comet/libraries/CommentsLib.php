<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CommentsLib {

	private $ci;
	private $module;
	private $module_link;

	public function __construct() {
		$this->ci =& get_instance();
		$this->ci->load->model('comments/comments_m');	
	}

	private function add() {
		return $this->ci->template
			->set('data', array('module' => $this->module, 'link' => $this->module_link))
			->load_view('comment_add.twig');
	}

	private function display() {
		return $this->ci->template
			->set('data', $this->ci->comments_m->get_comments($this->module, $this->module_link))
			->load_view('comment.twig');
	}

	public function render($mod, $link) {
		$this->module 		= $mod;
		$this->module_link 	= $link;

		return $this->display().$this->add();
	}
}