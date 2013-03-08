<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Roster_m extends MY_Model {

	public function get_team_roster($id) {
		$this->db->select('*');
		$this->db->where('team_id', $id);
		return $this->db->from('teams_members')->get()->result();
	}
}