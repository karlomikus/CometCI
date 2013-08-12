<?php defined('BASEPATH') OR exit('No direct script access allowed');

function get_label_image($labelID = 0)
{
	$CI =& get_instance();
	$CI->load->model('labels/labels_m', 'label');
	$query = $CI->label->get($labelID);

	if(!empty($query->banner)) $banner = $query->banner;
	else $banner = '';

	return $banner;
}

function get_post_image($postID = 0)
{
	$CI =& get_instance();
	$CI->load->model('posts/posts_m');
	$query = $CI->posts_m->get($postID);

	if(!empty($query->image)) $image = $query->image;
	else $image = null;

	return $image;
}