<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function insertnote()
    {
        if (!$this->input->is_ajax_request()) redirect('admin/');
        $this->load->model('notes_m', 'note');

        if(!empty($_POST))
        {
            $content = $this->input->post('notecontent', true);

            if(!empty($content))
            {
            	$nextID = $this->note->get_next_id();
                $data = array(
                    'author' => $this->user->id,
                    'content' => trim(htmlspecialchars($content)),
                    'date' => date('Y-m-d H:i:s')
                );

                $this->note->insert($data);

                $data['author'] = get_username($this->user->id);
                $data['id'] = $nextID;
                echo json_encode($data);
            }
            else
            {
                header("HTTP/1.0 404 Not Found");
            }
        }
    }

    public function removenote($id = 0)
    {
        if (!$this->input->is_ajax_request()) redirect('admin/');
        $this->load->model('notes_m', 'note');

        if(!empty($id))
        {
            $this->note->delete($id);

            echo '1';
        }
        else
        {
            header("HTTP/1.0 404 Not Found");
        }
    }

}