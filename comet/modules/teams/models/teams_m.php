<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teams_m extends MY_Model {

	public function get_team_members($id) {
		$this->db->select('user_id');
		$this->db->from('teams_members');
		$this->db->join('teams', 'teams.id = teams_members.team_id');
		$this->db->where('teams.id', $id);
		
		return $this->db->get()->result_array();
	}
}