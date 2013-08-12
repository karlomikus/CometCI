<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_m extends MY_Model {

	public function update_views($id) 
	{
		$total_views = parent::get($id)->views;
		$total_views++;
		parent::update($id, array('views' => $total_views));
	}

	public function get_id_from_slug($slug)
	{
		$data = parent::get_by('slug', $slug);
		return $data->id;
	}

	public function delete_post_comments($id)
	{
		$this->db->delete('comments', array('module' => 'posts', 'module_link' => $id)); 
	}

	public function get_featured_posts()
	{
		return parent::get_many_by('featured', 1);
	}

	public function get_frontpage_posts($limit, $offset, $includeClanPosts = false)
	{
		$this->db->order_by('date', 'desc');
		$this->db->limit($limit, $offset);

		if($includeClanPosts)
		{
			$this->db->where('state', 1);
		}
		else
		{
			$this->db->where('state', 1);
			$this->db->where('clan', 0);
		}

		return $this->db->get('posts')->result();
	}
}