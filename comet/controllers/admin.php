<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

    /**
     * Show dashboard page
     * @return void
     */
    public function index() 
    {
        $this->load->helper('form');
        $this->load->model('matches/matches_m');
        $this->load->model('events/events_m');
        $this->load->model('comet_m');
        $this->load->model('notes/notes_m');
        $this->load->helper('matches');

        $upcomingMatches = $this->matches_m->get_upcoming_matches(date('Y-m-d'));
        $upcomingEvents = $this->events_m->get_date_events(date('Y-m-d'));

        $monthlyVisits = $this->comet_m->get_visits_stats(date('m'));

        $this->notes_m->order_by('date', 'desc');
        $this->notes_m->limit(5);
        $notes = $this->notes_m->get_all();

        $installFolder = false;
        if(file_exists('./_install/'))
        {
            $installFolder = true;
        }

        $this->template
            ->set('title', 'Dashboard')
            ->set('matches', $upcomingMatches)
            ->set('events', $upcomingEvents)
            ->set('visits', $monthlyVisits)

            ->set('countcomments', $this->comet_m->count_table_rows('comments'))
            ->set('countposts', $this->comet_m->count_table_rows('forum_replies'))
            ->set('countopics', $this->comet_m->count_table_rows('forum_topics'))
            ->set('countusers', $this->comet_m->count_table_rows('users'))

            ->set('commentstats', $this->comet_m->generate_stats('comments'))
            ->set('postsstats', $this->comet_m->generate_stats('forum_replies'))
            ->set('topicsstats', $this->comet_m->generate_stats('forum_topics'))
            ->set('userstats', $this->comet_m->generate_stats('users'))

            ->set('installer', $installFolder)
            ->set('notes', $notes)

            ->build('admin/dashboard');
    }

    public function login()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run())
        {
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
                // Login successful
                redirect('admin');
            }
            else
            {
                redirect('admin/login');
            }
        }
        else
        {
            $this->template
                ->set_layout(null)
                ->build('admin/login');
        }
    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('admin/login');
    }

    public function update_graph($month)
    {
        if (!$this->input->is_ajax_request()) redirect('admin/');
        $monthlyVisits = $this->comet_m->get_visits_stats($month);
        return $monthlyVisits;
    }

}