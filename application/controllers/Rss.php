<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rss extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->helper(array('xml','text'));
		$this->load->model('m_rss');
        $this->load->model('m_home');		
        $this->load->model('m_post');		
        $this->load->model('m_keyword');		
        $this->load->model('m_category');		
	}

    public function index(){
        // echo "halaman rss";
		$data = array(
			'encoding' 			=> 'utf-8',
			'feed_name' 		=> 'Poverty Resouce Center Initiative',
			'feed_url' 			=> base_url().'feed/',
			'page_description' 	=> 'Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian',
			'page_language' 	=> 'in',
			'creator_email' 	=> 'info.prcinitiative@gmail.com',
			'posts' 			=> $this->m_rss->get_posts(10)
		);


		header("Content-Type: application/rss+xml");
		$this->load->vars($data);
		$this->load->view('rss');
    }
}