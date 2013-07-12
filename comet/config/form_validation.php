<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	'banners' => array(
		array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'trim|required|min_length[5]|max_length[20]|htmlspecialchars|xss_clean'
			 ),
		array(
				'field' => 'url',
				'label' => 'Banner URL',
				'rules' => 'trim|required|htmlspecialchars|prep_url|xss_clean'
			 )
		),
	'events' => array(
		array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required|trim|htmlspecialchars|min_length[5]|xss_clean'
			 ),
		array(
				'field' => 'description',
				'label' => 'Description',
				'rules' => 'required'
			 ),
		array(
				'field' => 'link',
				'label' => 'Link',
				'rules' => 'prep_url|trim|htmlspecialchars|xss_clean'
			 ),
		array(
				'field' => 'startdate',
				'label' => 'Starting date',
				'rules' => 'required|xss_clean'
			 ),
		array(
				'field' => 'starttime',
				'label' => 'Starting time',
				'rules' => 'required|xss_clean'
			 ),
		array(
				'field' => 'enddate',
				'label' => 'Ending date',
				'rules' => 'required|xss_clean'
			 ),
		array(
				'field' => 'endtime',
				'label' => 'Ending time',
				'rules' => 'required|xss_clean'
			 )
		),
	'posts' => array(
		array(
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'required|min_length[4]|xss_clean'
		),
		array(
				'field' => 'body',
				'label' => 'Content',
				'rules' => 'required|min_length[5]'
			 )
		),
		array(
				'field' => 'label',
				'label' => 'Label',
				'rules' => 'required'
		)
);