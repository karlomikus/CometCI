<?php defined('BASEPATH') OR exit('No direct script access allowed');

function count_comments($module, $id)
{
	$CI =& get_instance();
	$CI->load->model('comments/comments_m');

	return $CI->comments_m->count_comments($module, $id);
}