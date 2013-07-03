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