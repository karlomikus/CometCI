<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Matches_m extends MY_Model {

	public function insert_scores($scores) {
		if(is_array($scores)) {
			$this->db->insert_batch('matches_scores', $scores);
			return true;
		}
	}

	public function get_scores($id) {
		$this->db->select('*');
		return $this->db->get_where('matches_scores', array('match' => $id))->result();
	}

	public function calculate_score($side, $id) {
		$this->db->select($side);
		$query = $this->db->get_where('matches_scores', array('match' => $id))->result();
		$result = 0;

		foreach($query as $score) {
			if($side == 'team') $result += $score->team;
			else $result += $score->opponent;
		}

		return $result;
	}

	public function get_match_outcome($id, $text = true) {
		$home = $this->calculate_score('team', $id);
		$away = $this->calculate_score('opponent', $id);

		$outcome = 0; // DRAW
		if($home > $away) $outcome = 1; // WIN
		elseif($home < $away) $outcome = 2; // LOSE

		if($text) {
			if($outcome == 1) $outcome_text = 'WIN';
			elseif($outcome == 2) $outcome_text = 'LOSE';
			else $outcome_text = 'DRAW';
		}

		return $text ? $outcome_text : $outcome;
	}

	public function insert_files($matchID, $file, $type='screenshot') {
		$data = array(
			'match_id' => $matchID,
			'file' => $file,
			'type' => $type
		);
		return $this->db->insert('matches_files', $data); 
	}
}