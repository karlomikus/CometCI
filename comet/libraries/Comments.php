<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comments {

	private $CI;

	public function __construct() {
		$this->CI =& get_instance();

	}

	// Renders comments list and add comment form
	public function render() {

		return $this->CI->parser->parse('comment_add.twig');
	}
}