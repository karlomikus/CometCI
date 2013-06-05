<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_m extends MY_Model {

	/**
	 * Fetch specific set of comments
	 * @param  string  $module  Module from where comments are called
	 * @param  int     $id      Module content ID from where comments are called
	 * @return object
	 */
	public function get_comments($module, $id)
	{
		$query = $this->db->get_where('comments', array('module' => $module, 'module_link' => $id));

		return $query->result();
	}

	/**
	 * Count specific set of comments
	 * @param  string  $module  Module from where comments are called
	 * @param  int     $id      Module content ID from where comments are called
	 * @return object
	 */
	public function count_comments($module, $id)
	{
		$this->db->where('module', $module);
		$this->db->where('module_link', $id);
		return $this->db->count_all_results('comments');
	}

	/**
	 * Get last comment that user has posted
	 * @param  int    $userID  User ID
	 * @return object
	 */
	public function getLastUserComment($userID)
	{
		$this->db->order_by('date', 'desc');
		$this->db->limit(1);
		$query = $this->db->get_where('comments', array('poster_id' => $userID));

		return $query->result();
	}
}