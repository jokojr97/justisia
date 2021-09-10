<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('upload');        
        $this->load->model('m_users');
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
		$this->session->set_flashdata('breadcrumb', 'Users');
		$this->session->set_flashdata('menu', 'users');
		$this->session->set_flashdata('menuName', 'List Users');
		$this->session->set_flashdata('icon', 'fas fa-users');
		$data['users'] = $this->m_users->get_users();        
		$this->load->view('admin/users/index.php', $data);
    }
    public function add(){
        // echo "halaman admin page index";
		$this->session->set_flashdata('breadcrumb', 'Admin / Add Users');
		$this->session->set_flashdata('menu', 'users');
		$this->session->set_flashdata('menuName', 'Add Users');
		$this->session->set_flashdata('icon', 'fas fa-users');
		$data['users'] = $this->m_users->get_users();        
		$this->load->view('admin/users/add.php', $data);
    }
    public function edit($id){
        // echo "halaman admin page index";
		$this->session->set_flashdata('breadcrumb', 'Users');
		$this->session->set_flashdata('menu', 'users');
		$this->session->set_flashdata('menuName', 'List Users');
		$this->session->set_flashdata('icon', 'fas fa-users');
		$data['users'] = $this->m_users->get_users();        
		$this->load->view('admin/users/index.php', $data);
    }
    public function delete($id){
		$data['users'] = $this->m_users->get_users();        
		$this->load->view('admin/users/index.php', $data);
    }


}