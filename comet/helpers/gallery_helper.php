<?php defined('BASEPATH') OR exit('No direct script access allowed');

function count_gallery_items($galleryID = 0)
{
	$CI =& get_instance();
	$CI->load->model('gallery/gallery_files_m', 'gallery');

	return $CI->gallery->count_by('gallery', $galleryID);
}

function show_gallery_preview($galleryID = 0)
{
	$CI =& get_instance();
	$CI->load->model('gallery/gallery_files_m', 'gallery');

	return $CI->gallery->get_by('gallery', $galleryID)->file;
}