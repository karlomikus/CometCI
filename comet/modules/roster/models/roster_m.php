<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Roster_m extends MY_Model {

	/**
	 * Gets all available teams
	 * @return object
	 */
	public function get_teams()
	{
		$this->db->select('*');
		$this->db->from('teams');

		return $this->db->get()->result();
	}

	/**
	 * Gets all members from team
	 * @param  int $id Team ID
	 * @return object
	 */
	public function get_team_roster($id)
	{
		$this->db->select('*');
		$this->db->where('team_id', $id);

		return $this->db->from('teams_members')->get()->result();
	}

	/**
	 * Gets all games played by team
	 * @param  int $id Team ID
	 * @return array
	 */
	public function get_team_games($id)
	{
		$this->db->select('games');
		$this->db->where('id', $id);
		$query = $this->db->from('teams')->get()->result();
		$gamesArray =  explode(',', $query[0]->games);

		return $gamesArray;
	}

	/**
	 * Adds user(s) to team
	 * @param array $data    Array of user ID's
	 * @param int $team_id ID of team to be changed
	 */
	public function add_to_roster($data, $team_id)
	{
		$this->clear_roster($team_id);
		for ($i=0; $i < count($data); $i++)
		{ 
			$insert_data = array(
				'user_id' => (int)$data[$i],
				'team_id' => $team_id
			);
			$this->db->insert('teams_members', $insert_data);	
		}
	}

	/**
	 * Removes all users from team
	 * @param  int $team_id teamID
	 */
	public function clear_roster($team_id)
	{
		$this->db->delete('teams_members', array('team_id' => $team_id));
	}
}