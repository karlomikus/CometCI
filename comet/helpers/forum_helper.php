<?php defined('BASEPATH') OR exit('No direct script access allowed');

function count_topics($forumID)
{
	$CI =& get_instance();
	$CI->load->model('forums/forums_m');

	return $CI->forums_m->count_forum_topics($forumID);
}

function count_replies_in_forum($forumID)
{
	$CI =& get_instance();
	$CI->load->model('forums/forums_m');

	return $CI->forums_m->count_forum_posts($forumID);
}

function count_replies($topicID)
{
	$CI =& get_instance();
	$CI->load->model('forums/forums_m');

	return $CI->forums_m->count_topic_replies($topicID);
}

function get_last_post_in_topic($topic)
{
	$CI =& get_instance();
	$CI->load->model('forums/forums_m');

	return $CI->forums_m->get_last_post($topic);
}

function get_views($id)
{
	$CI =& get_instance();
	$CI->load->model('forums/forums_m');

	return $CI->forums_m->count_views($id);
}