<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posttype extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('m_post');
        $this->load->model('m_admin');
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
		$this->session->set_flashdata('breadcrumb', 'Tipe Post');
		$this->session->set_flashdata('menu', 'berita');
		$this->session->set_flashdata('menuName', 'Tipe Post');
		$this->session->set_flashdata('icon', 'fas fa-newspaper');

		$data['typepost'] = $this->m_post->get_type_post_obj();
		
		$this->load->view('admin/tipe_post', $data);
    }

    public function hapus() {
        $id = $this->uri->segment(4);
        $hapus = $this->m_post->hapus_tipe($id);
        if ($hapus) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">berhasil menghapus tipe post!</div>');
            redirect('admin/tipe_post','refresh');
        }
    }
    
    public function insert() {
        $posttipe = $this->input->get('posttipe');
        $posttipeslug = $this->make_slug($posttipe);
        $get_tipe_by_slug = $this->m_post->get_tipe_by_slug($posttipeslug);
        if(!$get_tipe_by_slug) {
            $inputposttipe = $this->m_post->insert_tipe($posttipe,$posttipeslug);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil menambahkan tipe post!</div>');
            redirect('admin/tipe_post','refresh');
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tipe post sudah ada!</div>');
            redirect('admin/tipe_post','refresh');
        }

    }

    public function getname() {
        $id = $this->input->get('id');
        $get_tipe_by_id = $this->m_post->get_tipe_by_id($id);
        $json = json_encode($get_tipe_by_id);
        echo $json;
    }
    public function updatetipe() {
        $tipenameanyar = $this->input->get('nameanyar');
        $tipenamelawas = $this->input->get('namelawas');
        $tipesluglawas = $this->make_slug($tipenamelawas);
        $tipesluganyar = $this->make_slug($tipenameanyar);
        $get_tipe_by_slug = $this->m_post->get_tipe_by_slug($tipesluglawas);
        if($get_tipe_by_slug) {
            $id = $get_tipe_by_slug['id'];
            $this->m_post->update_tipe($id,$tipenameanyar,$tipesluganyar);
            $this->update_posttypename_post();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil merubah tipe post!</div>');
            redirect('admin/tipe_post','refresh');
        }else {
            $this->m_post->insert_tipe($tipenameanyar,$tipesluganyar);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil menambahkan tipe post!</div>');
            redirect('admin/tipe_post','refresh');
        }
    }
    	
	private function make_slug($string) {
		$slug = strtolower($string);
		$slug = str_replace(" ","-",$slug);
		$slug = str_replace(";","",$slug);
		$slug = str_replace(",","",$slug);
		$slug = str_replace("?","",$slug);
		$slug = str_replace("!","",$slug);
		$slug = str_replace("(","",$slug);
		$slug = str_replace(")","",$slug);
		$slug = str_replace("]","",$slug);
		$slug = str_replace("[","",$slug);
		$slug = str_replace(".","",$slug);
		$slug = str_replace("'","",$slug);
		$slug = str_replace('"',"",$slug);
		$slug = str_replace('&',"",$slug);
		return $slug;
	}

	public function update_posttypename_post() {
		$get_post = $this->m_post->get_post();
		foreach ($get_post->result() as $row) {
			$id_kategori = $row->post_type;
			$post_id = $row->id_post;
			$get_type_id = $this->m_post->get_posttype_by_id($id_kategori);
			$hasil = $this->m_post->update_posttype_post($post_id,$get_type_id['posttype_name']);
			if ($hasil) {
				// echo "berhasil update kategori.<br>";
			}
		}
	}
}