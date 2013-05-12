<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forums extends Frontend_Controller {

	/**
	 * Maximum topics shown per forum page
	 * @var integer
	 */
	public $max_topic_per_forum = 10;

	/**
	 * Maximum topic replies shown
	 * @var integer
	 */
	public $max_topic_replies = 10;

	/**
	 * Sets some template variables that are need
	 * all over the forum module
	 */
	function __construct()
	{
		parent::__construct();
		$this->template
			->set('logged_in', $this->ion_auth->logged_in());
	}

	/**
	 * Lists all available forums,
	 * grouped by label
	 */
	public function index()
	{
		$this->load->model('forums_m');
		$this->load->helper('forum');
		$this->parser->addFunction('count_topics');
		$this->parser->addFunction('count_replies_in_forum');

		$data = array();
		$active_labels = $this->forums_m->get_active_forum_labels();
		foreach ($active_labels as $label) {
			$data[$label] = $this->forums_m->get_many_by('label', $label);
		}

		$this->template
			->set('data', $data)
			->build('main.twig');
	}

	/**
	 * Lists all topics in given forum
	 * @param  integer $id Forum ID
	 */
	public function forum($id = 0, $page = 0)
	{
		$this->load->model('forums_m');
		$this->load->helper('forum');
		$this->load->library('pagination');

		// Pagination configuration
		$config['base_url'] = base_url().'forums/forum/'.$id;
		$config['total_rows'] = $this->forums_m->count_forum_topics($id);
		$config['per_page'] = $this->max_topic_per_forum;
		$config['uri_segment'] = 4;

		// Oh god what is this?
		$config['next_link'] = '&raquo;';
		$config['prev_link'] = '&laquo;';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="current"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li class="arrow">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="arrow">';
		$config['prev_tag_close'] = '</li>';

		// Let's do this
		$this->pagination->initialize($config);

		// Add missing functions from forum helper to twig parser
		$this->parser->addFunction('count_replies');
		$this->parser->addFunction('get_last_post_in_topic');
		$this->parser->addFunction('get_views');

		// Check privileges
		$is_mod = FALSE;
		if($this->forums_m->is_moderator($this->user->user_id, $id) || $this->ion_auth->is_admin()) $is_mod = TRUE;

		// Sort and limit forum topics
		$this->forums_m->order_by('sticky', 'DESC');
		$this->forums_m->limit($this->max_topic_per_forum, $page);

		$this->template
			->set('data', $this->forums_m->get_forum_topics($id))
			->set('is_mod', $is_mod)
			->set('forumID', $id)
			->set('pagination', $this->pagination->create_links())
			->build('forum.twig');
	}

	/**
	 * Shows forum topic with all replies,
	 * first post is the original post
	 * @param  integer $id Topic ID
	 */
	public function topic($id = 0)
	{
		$this->load->model('forums_m');

		$data_op = $this->forums_m->get_topic($id); // Original post
		$data = $this->forums_m->get_topic_replies($id); // Replies

		$forumID = $this->forums_m->get_topic_forum($id)->forum;
		$this->forums_m->update_views('forum_topics', $id);

		// Check privileges
		$is_mod = FALSE;
		if($this->forums_m->is_moderator($this->user->user_id, $forumID) || $this->ion_auth->is_admin()) $is_mod = TRUE;

		$this->template
			->set('original_post', $data_op)
			->set('data', $data)
			->set('is_mod', $is_mod)
			->build('topic.twig');
	}

	/**
	 * Creates new topic in given forum
	 * @param  integer $forumID Forum ID
	 */
	public function newtopic($forumID = 0)
	{
		$this->load->model('forums_m');
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Load missing twig functions
		$this->parser->addFunction('validation_errors');
		$this->parser->addFunction('form_open');
		$this->parser->addFunction('form_close');

		$this->form_validation->set_rules('title', 'Topic title', 'required');
		$this->form_validation->set_rules('content', 'Topic content', 'required');

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

	public function deletetopic($topicID = 0)
	{
		$this->load->model('forums_m');

		$forumID = $this->forums_m->get_topic_forum($topicID)->forum;
		$is_mod = FALSE;
		if($this->forums_m->is_moderator($this->user->user_id, $forumID) || $this->ion_auth->is_admin()) $is_mod = TRUE;

		if($is_mod) {
			$this->forums_m->delete_topic($topicID);
			redirect('forums/forum/'.$forumID);
		}
		else {
			redirect('forums/forum/'.$forumID);
		}
	}

	public function locktopic($topicID = 0)
	{
		// TODO
	}

	public function newreply($topicID = 0)
	{
		$this->load->library('form_validation');
		$this->load->model('forums_m');
		$this->parser->addFunction('validation_errors');

		$this->form_validation->set_rules('content', 'Reply content', 'required');

		if($this->form_validation->run())
		{
			$data = array(
				'topic' => $topicID,
				'poster' => $this->user->user_id,
				'date' => date('Y-m-d H:i:s'),
				'content' => $this->input->post('content')
			);

			$this->forums_m->insert_reply($data);
			redirect('forums/topic/'.$topicID);
		}
		else
		{
			$this->template
				->set('topicID', $topicID)
				->build('new-reply.twig');
		}
	}

}

/* End of file forums.php */
/* Location: .//C/wamp/www/cms/comet/modules/forums/controllers/forums.php */