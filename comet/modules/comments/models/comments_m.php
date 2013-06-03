<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_m extends MY_Model {

	public function get_comments($module, $id)
	{
		$query = $this->db->get_where('comments', array('module' => $module, 'module_link' => $id));

		return $query->result();
	}

	public function getLastUserComment($userID)
	{
		$this->db->order_by('date', 'desc');
		$this->db->limit(1);
		$query = $this->db->get_where('comments', array('poster_id' => $userID));

		return $query->result();
	}
}