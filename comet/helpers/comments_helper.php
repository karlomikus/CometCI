<?php defined('BASEPATH') OR exit('No direct script access allowed');

//TODO: Transfer this helper to library (maybe)

function comments_display($module, $id) {
	$ci =& get_instance();
	$ci->load->model('comments/comments_m');

	return $ci->template
				->set('data', $ci->comments_m->get_comments($module, $id))
				->load_view('comment.twig');
}

function comments_add() {
	$ci =& get_instance();

	return $ci->template
				->load_view('comment_add.twig');
}

function comments_render($module, $id) {
	$result = comments_display($module, $id);
	$result .= comments_add();

	return $result;
}