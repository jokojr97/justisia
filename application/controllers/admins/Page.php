<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('upload');        
        $this->load->model('m_page');
        $this->load->helper('file');
		$role_id = $this->session->userdata('role_id');
		if ($role_id == 2) {					
		} else if ($role_id == 1) {			
			redirect('adminsuper','refresh');	
		} else {
			redirect('auth','refresh');
		}
	}

    public function index(){
        // echo "halaman admin page index";
		$this->session->set_flashdata('breadcrumb', 'Page');
		$this->session->set_flashdata('menu', 'page');
		$this->session->set_flashdata('menuName', 'List Page');
		$this->session->set_flashdata('icon', 'far fa-newspaper');
		$data['pages'] = $this->m_page->get_page();
		// $data['kategori'] = $this->m_admin->kategori();
		$this->load->view('admin/page', $data);
    }


}