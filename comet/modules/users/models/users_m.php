<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends MY_Model {

	public function check_unread_messages($userID)
	{
		$this->db->where('to', $userID);
		$this->db->where('status', null);
		$this->db->from('messages');

		$results = $this->db->count_all_results();

		if($results > 0) return $results;
		return 0;
	}

}