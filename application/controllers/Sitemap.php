<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
        $this->load->model('m_home');		
        $this->load->model('m_post');		
        $this->load->model('m_keyword');		
        $this->load->model('m_category');		
	}

    public function index(){
        $this->output->set_content_type('text/xml');
        $data['post'] = $this->m_post->get_post();
        $data['poster'] = $this->m_home->get_poster();
        $data['category'] = $this->m_category->get_category();
        $data['posttipe'] = $this->m_post->get_type_post();
        $data['tags'] = $this->m_keyword->get_all();
        
        $this->load->view('sitemap', $data);
    }
}