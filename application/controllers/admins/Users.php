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

		$this->form_validation->set_rules('name', 'Name', 'required|trim',[
			'required' => 'Name is Required',
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim',[
			'required' => 'Username is Required',
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',[
			'required' => 'Password is Required',
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]',[
			'required' => 'Password is Required',
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
			'required' => 'Email is Required',
		]);

		if ($this->form_validation->run() == false) {		
			$this->session->set_flashdata('breadcrumb', 'Add Users');
			$this->session->set_flashdata('menu', 'users');
			$this->session->set_flashdata('menuName', 'Add Users');
			$this->session->set_flashdata('icon', 'fas fa-users');
			$data['users'] = $this->m_users->get_users();        
			$this->load->view('admin/users/add.php', $data);
		}else {
			// echo "validasi berhasil";
			// validasi berhasil
			$username = $this->input->post('username', true);
			$name = $this->input->post('name', true);
			$email = $this->input->post('email', true);
			$sex = $this->input->post('sex', true);
			$img = "default.jpg";
			$password1 = $this->input->post('password1', true);
			$password2 = $this->input->post('password2', true);
			$role = $this->input->post('role', true);
			$is_active = 1;
			$date_create = date("Y/m/d");
			
			$data = [
				'username' => htmlspecialchars($username),
				'nama' => htmlspecialchars($name),
				'email' => htmlspecialchars($email),
				'jenis_kelamin' => htmlspecialchars($sex),
				'gambar' => $img,
				'password' => password_hash($password1, PASSWORD_DEFAULT),
				'role_id' => htmlspecialchars($role),
				'is_active' => $is_active,
				'date_created' => date("Y/m/d"),
			];
			$this->db->insert('jsts_user', $data);			
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun Anda Berhasil di Buat. Cek Email untuk vertifikasi. Cek di spam jika tidak ada di inbox!!!</div>');
			redirect(base_url().'admin/users','refresh');
			// echo json_encode($data);
		}
    }

	public function edit(){
		$id = $this->uri->segment(4);
		if(is_numeric($id) && $id > 0) {
			
			$this->form_validation->set_rules('name', 'Name', 'required|trim',[
				'required' => 'Name is Required',
			]);
			$this->form_validation->set_rules('username', 'Username', 'required|trim',[
				'required' => 'Username is Required',
			]);
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',[
				'required' => 'Password is Required',
			]);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]',[
				'required' => 'Password is Required',
			]);
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
				'required' => 'Email is Required',
			]);

			if ($this->form_validation->run() == false) {		
				$this->session->set_flashdata('breadcrumb', 'Edit Users');
				$this->session->set_flashdata('menu', 'users');
				$this->session->set_flashdata('menuName', 'Edit Users');
				$this->session->set_flashdata('icon', 'fas fa-users');
				$data['user'] = $this->m_users->get_users_by_id($id);
				// var_dump($data['users']);
				$this->load->view('admin/users/edit.php', $data);
			}else {
				// echo "validasi berhasil";
				// validasi berhasil
				$username = $this->input->post('username', true);
				$name = $this->input->post('name', true);
				$email = $this->input->post('email', true);
				$sex = $this->input->post('sex', true);
				$img = "default.jpg";
				$password1 = $this->input->post('password1', true);
				$password2 = $this->input->post('password2', true);
				$role = $this->input->post('role', true);
				$is_active = 1;
				$date_create = date("Y/m/d");
				
				$data = [
					'username' => htmlspecialchars($username),
					'nama' => htmlspecialchars($name),
					'email' => htmlspecialchars($email),
					'jenis_kelamin' => htmlspecialchars($sex),
					'gambar' => $img,
					'password' => password_hash($password1, PASSWORD_DEFAULT),
					'role_id' => htmlspecialchars($role),
					'is_active' => $is_active,
					'date_created' => date("Y/m/d"),
				];
				$this->db->insert('jsts_user', $data);			
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun Anda Berhasil di Buat. Cek Email untuk vertifikasi. Cek di spam jika tidak ada di inbox!!!</div>');
				redirect(base_url().'admin/users','refresh');
			}
		}
    }

    public function delete($id){
		$id = $this->uri->segment(4);
		if(is_numeric($id) && $id > 0) {
			$delete = $this->db->delete('jsts_user', array('id' => $id));			
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus User!!!</div>');
			redirect(base_url().'admin/users','refresh');
		}else {					
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User Id, Tidak Sesuai!!!</div>');
			redirect(base_url().'admin/users','refresh');
		}
		// var_dump($id);
		// $data['users'] = $this->m_users->get_users();        
		// $this->load->view('admin/users/index.php', $data);
    }


}