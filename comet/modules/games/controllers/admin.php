<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

    private $folder_path = './assets/games/';

    public function __construct()
    {
        parent::__construct();

        $this->load->model('games_m');
    }

    public function index()
    {
        $this->games_m->order_by('name');

        $this->template
            ->set('title', 'Games')
            ->set('games', $this->games_m->get_all())
            ->build('admin/main');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Game name', 'required|trim|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('shortcode', 'Shortcode', 'required|trim|htmlspecialchars|max_length[4]|xss_clean|is_unique[games.shortcode]');

        $config['upload_path']   = $this->folder_path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '2024';
        $config['max_width']     = '128';
        $config['max_height']    = '128';
        
        if ($this->form_validation->run() == TRUE)
        {
            $shortcode = strtolower($this->input->post('shortcode'));
            $config['file_name'] = $shortcode;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('icon'))
            {
                $icon_data = $this->upload->data();
            }
            else
            {
                $this->session->set_flashdata('file_error', $this->upload->display_errors('', ''));
                redirect('admin/games/create');
            }

            $data = array(
                'name' => $this->input->post('name'),
                'shortcode' => $shortcode,
                'icon' => $icon_data['file_name']
            );

            $this->games_m->insert($data);
            redirect('admin/games');
        }
        else
        {
            $this->template
            ->set('title', 'Create Game')
            ->build('admin/form');
        }
    }

    public function edit($id = 0) 
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Game name', 'required|trim|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('shortcode', 'Shortcode', 'required|trim|htmlspecialchars|max_length[4]|xss_clean');

        $config['upload_path']   = $this->folder_path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '2024';
        $config['max_width']     = '128';
        $config['max_height']    = '128';

        if ($this->form_validation->run() == TRUE) 
        {
            $shortcode = strtolower($this->input->post('shortcode'));
            $config['file_name'] = $shortcode;
            $this->load->library('upload', $config);

            if(!empty($_FILES['banner']['icon']))
            {
                if ($this->upload->do_upload('icon'))
                {
                    $icon_data = $this->upload->data();
                }
                else
                {
                    $this->session->set_flashdata('file_error', $this->upload->display_errors('', ''));
                    redirect('admin/games/create');
                }
            }

            $fileIcon = $this->games_m->get($id)->icon;
            if(!empty($icon_data))
            {
                unlink($this->folder_path.$fileIcon);
                $fileIcon = $icon_data['file_name'];
            }

            $data = array(
                'name' => $this->input->post('name'),
                'shortcode' => $shortcode,
                'icon' => $fileIcon
            );

            $this->games_m->update($id, $data);
            redirect('admin/games');
        }
        else 
        {
            $this->template
            ->set('title', 'Edit Game')
            ->set('data', $this->games_m->as_array()->get($id))
            ->build('admin/form');
        }
    }

    public function delete($id = 0)
    {
        $this->game = $this->games_m->get($id);
        $filepath = $this->folder_path.$this->game->icon;

        unlink($filepath);
        $this->games_m->delete($id);

        redirect('admin/games');
    }

}