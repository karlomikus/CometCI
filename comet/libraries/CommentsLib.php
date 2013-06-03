<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CommentsLib {

	private $ci; 			// Codeigniter instance
	private $module; 		// Module name
	private $module_link; 	// Link from which comment was called
	private $enabled; 		// Are comments enabled

	/**
	 * Loads comments model
	 */
	public function __construct()
	{
		$this->ci =& get_instance();

		$this->ci->load->model('comments/comments_m');
		$this->ci->load->model('settings/settings_m');
		$this->ci->load->helper('form');

		$commentsEnabled = $this->ci->settings_m->get(1)->comments;
		if(empty($commentsEnabled)) $this->enabled = FALSE;
		else $this->enabled = TRUE;
		
		$this->ci->parser->addFunction('form_open');
		$this->ci->parser->addFunction('form_close');

	}
	
	/**
	 * Shows add comment form if user is logged in
	 */
	private function add() 
	{
		if($this->ci->ion_auth->logged_in()) {
			return $this->ci->template
				->set('data', array('module' => $this->module, 'link' => $this->module_link))
				->load_view('comment_add.twig');
		}
		else {
			return $this->ci->template
				->load_view('comment_disabled.twig');
		}
	}

	/**
	 * Displays comments
	 */
	private function display() 
	{
		$comment_data = $this->ci->comments_m->get_comments($this->module, $this->module_link);

		$admin = FALSE;
		if($this->ci->ion_auth->is_admin()) $admin = TRUE;

		return $this->ci->template
			->set('data', $comment_data)
			->set('is_admin', $admin)
			->set('errors', $this->ci->session->flashdata('comment_error'))
			->load_view('comment.twig');
	}

	/**
	 * Shows comment template
	 * @param  string $mod  Module name
	 * @param  string $link Comments link page
	 * @return void       Prints out html page
	 */
	public function render($mod, $link) 
	{
		$this->module 		= $mod;
		$this->module_link 	= $link;

		if($this->enabled) return $this->display().$this->add();
		else return $this->ci->template->load_view('comment_disabled.twig');
	}
}