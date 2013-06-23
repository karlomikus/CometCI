<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Messages_m extends MY_Model {

	public function update_view_status($userID)
	{
		$query = parent::get_many_by('to', $userID);
		$data = array('status' => 1);

		foreach ($query as $msg)
		{
			parent::update($msg->id, $data);
		}
	}

	public function check_pms($userID)
	{
		$this->db->where('to', $userID);
		$this->db->where('status', 0);
		return $this->db->count_all_results('messages');
	}

}