<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

    private $assets_path = './assets/admin/games/';

    private $template_data = array(
        'title' => 'Games',
        'create_title' => 'Add game',
        'edit_title' => 'Edit game',
        'add_button' => 'Add game',
        'uri' => '/admin/games'
    );

    public function __construct() {
        parent::__construct();
        $this->load->model('games_m');

        $this->breadcrumb->append_crumb($this->template_data['title'], $this->template_data['uri']);
    }

    public function index($offset = 0) {
        $this->games_m->order_by('name');

        $this->template
            ->set($this->template_data)
            ->set('games', $this->games_m->get_all())
            ->build('admin/main');
    }

    public function create() {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->breadcrumb->append_crumb($this->template_data['create_title'], $this->template_data['uri'].'/create');

        $this->form_validation->set_rules('name', 'Game name', 'required');
        $this->form_validation->set_rules('shortcode', 'Shortcode', 'required|callback_check_shortcode');

        $config['upload_path']   = $this->assets_path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '1024';
        $config['max_width']     = '32';
        $config['max_height']    = '32';
        
        if ($this->form_validation->run() == TRUE) {

            $shortcode = strtolower($this->input->post('shortcode'));
            $config['file_name'] = $shortcode;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('icon')) {
                $icon_data = $this->upload->data();
            }
            else {
                redirect('admin/games');
            }

            $data = array(
                'name' => $this->input->post('name'),
                'shortcode' => $shortcode,
                'icon' => $icon_data['file_name']
            );    

            $this->games_m->insert($data);
            redirect('admin/games');
        }
        else {
            $this->template
            ->set('title', $this->template_data['create_title'])
            ->build('admin/form');
        }
    }

    public function edit($id = 0) {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->breadcrumb->append_crumb($this->template_data['edit_title'], $this->template_data['uri'].'/edit');

        $this->form_validation->set_rules('name', 'Game name', 'required');
        $this->form_validation->set_rules('shortcode', 'Shortcode', 'required');

        $config['upload_path']   = $this->assets_path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '1024';
        $config['max_width']     = '32';
        $config['max_height']    = '32';

        if ($this->form_validation->run() == TRUE) {

            $shortcode = strtolower($this->input->post('shortcode'));
            $config['file_name'] = $shortcode;
            $this->load->library('upload', $config);

            $data = array(
                'name' => $this->input->post('name'),
                'shortcode' => $shortcode
            );

            if ($this->upload->do_upload('icon')) {
                $icon_data = $this->upload->data();
                $data['icon'] = $icon_data['file_name'];
            }

            $this->games_m->update($id, $data);
            redirect('admin/games');
        }
        else {
            $this->template
            ->set('title', $this->template_data['edit_title'])
            ->set('data', $this->games_m->as_array()->get($id))
            ->build('admin/form');
        }
    }

    public function delete($id = 0) {
        $this->game = $this->games_m->get($id);
        $filepath = $this->assets_path.$this->game->icon;
        unlink($filepath);
        $this->games_m->delete($id);
        redirect('admin/games');
    }

    /* Check if shortcode is already in the database */
    public function check_shortcode($shortcode) {
        $games_array = $this->games_m->as_array()->get_all();
        if ($this->_recursive_array_search($shortcode, $games_array)) {
            $this->form_validation->set_message('check_shortcode', 'This shortcode is already in the database');
            return FALSE;
        }
        return TRUE;
    }

    /* Search multidimensional array for $needle */
    private function _recursive_array_search($needle,$haystack) {
        foreach($haystack as $key=>$value) {
            $current_key=$key;
            if($needle===$value OR (is_array($value) && $this->_recursive_array_search($needle,$value) !== false)) {
                return $current_key;
            }
        }
        return false;
    }
}