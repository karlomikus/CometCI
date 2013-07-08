<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation_m extends MY_Model {

	protected $_table = 'navigation';

	public function get_last_sort_index()
	{
		$this->db->select_max('sort');
		$query = $this->db->get('navigation')->row();
		
		return $query->sort;
	}
}