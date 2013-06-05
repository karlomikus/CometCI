<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

    /**
     * Show dashboard page
     * @return void
     */
    public function index() 
    {
        $this->load->model('matches/matches_m');
        $this->load->model('events/events_m');
        $this->load->model('comet_m');
        //$this->load->library('CPULoad');

        $this->template
            ->set('title', 'Dashboard')
            ->set('matches', $this->matches_m->get_upcoming_matches())
            ->set('events', $this->events_m->get_all())
            ->set('visits', $this->comet_m->get_visits_stats(date('m')))
            ->set('countcomments', $this->comet_m->count_table_rows('comments'))
            ->set('countposts', $this->comet_m->count_table_rows('forum_replies'))
            ->set('countopics', $this->comet_m->count_table_rows('forum_topics'))
            ->set('commentstats', $this->comet_m->generate_stats('comments'))
            ->set('postsstats', $this->comet_m->generate_stats('forum_replies'))
            ->set('topicsstats', $this->comet_m->generate_stats('forum_topics'))
            ->build('admin/dashboard');
    }

    /**
     * Custom admin login page
     * @return void
     */
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

}