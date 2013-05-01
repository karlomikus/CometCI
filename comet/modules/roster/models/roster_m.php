<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Roster_m extends MY_Model {

	public function get_team_roster($id) {
		$this->db->select('*');
		$this->db->where('team_id', $id);
		return $this->db->from('teams_members')->get()->result();
	}

	public function add_to_roster($data, $team_id) {
		$this->clear_roster($team_id);
		for ($i=0; $i < count($data); $i++) { 
			$insert_data = array(
				'user_id' => (int)$data[$i],
				'team_id' => $team_id
			);
			$this->db->insert('teams_members', $insert_data);	
		}
	}

	public function clear_roster($team_id) {
		$this->db->delete('teams_members', array('team_id' => $team_id));
	}
}