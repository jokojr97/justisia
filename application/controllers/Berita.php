<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Berita extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('pagination');
    }
     
    function index()
    {
        $this->load->view('TinyMCE_View');
    }
 
    function tinymce_upload() {
        $config['upload_path'] = './asset/images/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 0;
        // $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('file')) {
            $this->output->set_header('HTTP/1.0 500 Server Error');
            exit;
        } else {
            $file = $this->upload->data();
            $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode(['location' => base_url().'assets/'.$file['file_name']]))
                ->_display();
            exit;
        }
    }
}