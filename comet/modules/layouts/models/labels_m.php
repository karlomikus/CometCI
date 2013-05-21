<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Labels_m extends MY_Model {

	public function count_posts_in_label($labelID) {
		return $this->db->select('id')
					->from('posts')
					->where('label', $labelID)->get()->num_rows();
	}
}