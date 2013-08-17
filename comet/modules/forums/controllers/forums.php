<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forums extends Frontend_Controller {

	public $max_topic_per_forum = 10;
	public $max_topic_replies = 10;

	function __construct()
	{
		parent::__construct();

		$this->template
			->set('logged_in', $this->ion_auth->logged_in())
			->set_layout(get_layout(__CLASS__));
	}

	public function index()
	{
		$this->load->model('forums_m');
		$this->load->helper('forum');

		$this->parser->checkFunctions();

		$data = array();
		$active_labels = $this->forums_m->get_active_forum_labels();

		foreach ($active_labels as $label)
		{
			$data[$label] = $this->forums_m->get_many_by('label', $label);
		}

		$this->template
			->set('data', $data)
			->build('main.twig');
	}

	public function forum($id = 0, $page = 0)
	{
		$this->load->model('forums_m');
		$this->load->helper('forum');
		$this->load->library('pagination');

		// Pagination configuration
		$config = $this->config->item('pagination_frontend');
		$config['base_url'] = base_url().'forums/forum/'.$id;
		$config['total_rows'] = $this->forums_m->count_forum_topics($id);
		$config['per_page'] = $this->max_topic_per_forum;
		$config['uri_segment'] = 4;

		// Let's do this
		$this->pagination->initialize($config);

		// Add missing functions from forum helper to twig parser
		$this->parser->checkFunctions();

		// Check privileges
		$is_mod = FALSE;
		if($this->forums_m->is_moderator($this->user->user_id, $id) || $this->ion_auth->is_admin()) $is_mod = TRUE;

		// Sort and limit forum topics
		$this->forums_m->order_by('sticky', 'DESC');
		$this->forums_m->order_by('last_modified', 'DESC');
		$this->forums_m->limit($this->max_topic_per_forum, $page);

		$this->template
			->set('data', $this->forums_m->get_forum_topics($id))
			->set('is_mod', $is_mod)
			->set('forumID', $id)
			->set('pagination', $this->pagination->create_links())
			->build('forum.twig');
	}

	public function topic($id = 0)
	{
		$this->load->model('forums_m');
		$this->load->helper('forum');

		$this->parser->checkFunctions();

		$data_op = $this->forums_m->get_topic($id); // Original post
		$data = $this->forums_m->get_topic_replies($id); // Replies

		$forumID = $this->forums_m->get_topic_forum($id)->forum;
		$this->forums_m->update_views('forum_topics', $id);

		// Check privileges
		$is_mod = FALSE;
		if($this->forums_m->is_moderator($this->user->user_id, $forumID) || $this->ion_auth->is_admin()) $is_mod = TRUE;

		$is_locked = FALSE;
		if($this->forums_m->is_locked($id)) $is_locked = TRUE;

		$this->template
			->set('original_post', $data_op)
			->set('data', $data)
			->set('forumID', $forumID)
			->set('is_mod', $is_mod)
			->set('is_locked', $is_locked)
			->build('topic.twig');
	}

	public function newtopic($forumID = 0)
	{
		if(!$this->ion_auth->logged_in()) redirect();

		$this->load->model('forums_m');
		$this->load->helper('form');
		$this->load->helper('forum');
		$this->load->library('form_validation');

		// Load missing twig functions
		$this->parser->checkFunctions();

		$this->form_validation->set_rules('title', 'Topic title', 'required|min_length[4]|max_length[20]|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('content', 'Topic content', 'required|min_length[4]|htmlspecialchars|xss_clean');

		// Check privileges
		$is_mod = FALSE;
		if($this->forums_m->is_moderator($this->user->user_id, $forumID) || $this->ion_auth->is_admin()) $is_mod = TRUE;

		if($this->form_validation->run())
		{
			$data = array(
				'forum' => $forumID,
				'author' => $this->user->user_id,
				'title' => $this->input->post('title'),
				'date' => date('Y-m-d H:i:s'),
				'last_modified' => date('Y-m-d H:i:s'),
				'sticky' => $this->input->post('sticky'),
				'content' => $this->input->post('content')
			);

			$this->forums_m->insert_topic($data);
			redirect('forums/forum/'.$forumID);
		}
		else
		{
			$this->template
				->set('forumID', $forumID)
				->set('is_mod', $is_mod)
				->build('new-topic.twig');
		}
	}

	public function edittopic($topicID = 0)
	{
		if(!$this->ion_auth->logged_in()) redirect();

		$this->load->model('forums_m');
		$this->load->helper('form');
		$this->load->helper('forum');
		$this->load->library('form_validation');

		// Load missing twig functions
		$this->parser->checkFunctions();

		$forumID = $this->forums_m->get_topic_forum($topicID)->forum;
		$data = $this->forums_m->get_topic($topicID);

		$is_mod = FALSE;
		if($this->forums_m->is_moderator($this->user->user_id, $forumID) || $this->ion_auth->is_admin()) $is_mod = TRUE;

		$this->form_validation->set_rules('title', 'Topic title', 'required|min_length[4]|max_length[20]|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('content', 'Topic content', 'required|min_length[4]|htmlspecialchars|xss_clean');

		if($this->form_validation->run() && $is_mod)
		{
			$data = array(
				'title' => $this->input->post('title'),
				'last_modified' => date('Y-m-d H:i:s'),
				'sticky' => $this->input->post('sticky'),
				'content' => $this->input->post('content')
			);

			$this->forums_m->edit_topic($topicID, $data);
			redirect('forums/forum/'.$forumID);
		}
		else
		{
			$this->template
				->set('forumID', $forumID)
				->set('is_mod', $is_mod)
				->set('data', $data)
				->build('edit-topic.twig');
		}
	}

	public function deletetopic($topicID = 0)
	{
		if(!$this->ion_auth->logged_in()) redirect();

		$this->load->model('forums_m');
		$forumID = $this->forums_m->get_topic_forum($topicID)->forum;

		$is_mod = FALSE;
		if($this->forums_m->is_moderator($this->user->user_id, $forumID) || $this->ion_auth->is_admin()) $is_mod = TRUE;

		if($is_mod)
		{
			$this->forums_m->delete_topic($topicID);
			redirect('forums/forum/'.$forumID);
		}
		else
		{
			redirect('forums/forum/'.$forumID);
		}
	}

	public function locktopic($topicID = 0)
	{
		if(!$this->ion_auth->logged_in()) redirect();

		$this->load->model('forums_m');

		$is_mod = FALSE;
		if($this->forums_m->is_moderator($this->user->user_id, $forumID) || $this->ion_auth->is_admin()) $is_mod = TRUE;

		if($is_mod)
		{
			if($this->forums_m->is_locked($topicID))
			{
				$this->forums_m->set_locked($topicID, 0);
			}
			else
			{
				$this->forums_m->set_locked($topicID, 1);
			}
		}

		redirect('forums/topic/'.$topicID);
	}

	public function sticky($topicID = 0)
	{
		if(!$this->ion_auth->logged_in()) redirect();

		$this->load->model('forums_m');

		$is_mod = FALSE;
		if($this->forums_m->is_moderator($this->user->user_id, $forumID) || $this->ion_auth->is_admin()) $is_mod = TRUE;

		if($is_mod)
		{
			if($this->forums_m->is_sticky($topicID))
			{
				$this->forums_m->set_sticky($topicID, 0);
			}
			else
			{
				$this->forums_m->set_sticky($topicID, 1);
			}
		}

		redirect('forums/topic/'.$topicID);
	}

	public function newreply($topicID = 0)
	{
		if(!$this->ion_auth->logged_in()) redirect();

		$this->load->library('form_validation');
		$this->load->model('forums_m');
		$this->load->helper('form');
		$this->load->helper('forum');

		$this->parser->checkFunctions();

		if($this->forums_m->is_locked($topicID)) redirect('forums');

		$this->form_validation->set_rules('content', 'Reply content', 'required|min_length[4]|htmlspecialchars|xss_clean');		

		if($this->form_validation->run())
		{
			$data = array(
				'topic' => $topicID,
				'poster' => $this->user->user_id,
				'date' => date('Y-m-d H:i:s'),
				'content' => $this->input->post('content')
			);

			$this->forums_m->insert_reply($data);
			$this->forums_m->update_last_modified($topicID);
			redirect('forums/topic/'.$topicID);
		}
		else
		{
			$forumID = $this->forums_m->get_topic_forum($topicID)->forum;

			$this->template
				->set('topicID', $topicID)
				->set('forumID', $forumID)
				->build('new-reply.twig');
		}
	}

	public function editreply($topicID = 0, $replyID = 0)
	{
		if(!$this->ion_auth->logged_in()) redirect();
		
		$this->load->library('form_validation');
		$this->load->model('forums_m');
		$this->load->helper('form');
		$this->load->helper('forum');

		$this->parser->checkFunctions();

		if($this->forums_m->is_locked($topicID)) redirect('forums');

		$forumID = $this->forums_m->get_topic_forum($topicID)->forum;
		$data = $this->forums_m->get_topic_reply($replyID);

		$is_mod = FALSE;
		if($this->forums_m->is_moderator($this->user->user_id, $forumID) || $this->ion_auth->is_admin()) $is_mod = TRUE;

		$this->form_validation->set_rules('content', 'Reply content', 'required|min_length[4]|htmlspecialchars|xss_clean');		

		if($this->form_validation->run() && ($is_mod || $this->user->id == $data->poster))
		{
			$dataDb = array(
				'topic' => $topicID,
				'poster' => $this->user->user_id,
				'date' => date('Y-m-d H:i:s'),
				'content' => $this->input->post('content')
			);

			$this->forums_m->update_reply($replyID, $dataDb);
			redirect('forums/topic/'.$topicID);
		}
		else
		{
			$this->template
				->set('topicID', $topicID)
				->set('forumID', $forumID)
				->set('data', $data)
				->build('edit-reply.twig');
		}
	}

}

/* End of file forums.php */
/* Location: comet/modules/forums/controllers/forums.php */