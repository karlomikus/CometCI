<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_m extends MY_Model {

	public function update_views($id) 
	{
		$total_views = parent::get($id)->views;
		$total_views++;
		parent::update($id, array('views' => $total_views));
	}

}