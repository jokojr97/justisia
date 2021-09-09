<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('upload');        
        $this->load->model('m_category');
        $this->load->model('m_post');
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
		$this->session->set_flashdata('breadcrumb', 'Category');
		$this->session->set_flashdata('menu', 'category');
		$this->session->set_flashdata('menuName', 'List Category');
		$this->session->set_flashdata('icon', 'far fa-file-alt');
		$data['cat'] = $this->m_category->get_category();
		// $data['kategori'] = $this->m_admin->kategori();
		$this->load->view('admin/category', $data);
    }

    public function hapus() {
        $id = $this->uri->segment(4);
        $hapus = $this->m_category->hapus($id);
        if ($hapus) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil menghapus kategori!</div>');
            redirect('admin/categories','refresh');
        }
		// echo $id;
    }
	  
    public function insert() {
        $categories = $this->input->get('categories');
        $categoriesslug = $this->make_slug($categories);
        $get_categories_by_slug = $this->m_category->get_kategori_by_slug($categoriesslug);
        if(!$get_categories_by_slug) {
            $inputcategories = $this->m_category->insert_category($categories,$categoriesslug);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil menambahkan Kategori!</div>');
            redirect('admin/categories','refresh');
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kategori sudah ada!</div>');
            redirect('admin/categories','refresh');
        }
    }

    public function update() {
        $kategorinameanyar = $this->input->get('nameanyar');
        $kategorinamelawas = $this->input->get('namelawas');
        $kategorisluglawas = $this->make_slug($kategorinamelawas);
        $kategorisluganyar = $this->make_slug($kategorinameanyar);
        $get_kategori_by_slug = $this->m_category->get_kategori_by_slug($kategorisluglawas);
        
		if($get_kategori_by_slug) {
            $id = $get_kategori_by_slug['id'];
            $this->m_category->update($id,$kategorinameanyar,$kategorisluganyar);
			$this->update_kategoriname_post();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil merubah kategori post!</div>');
            redirect('admin/categories','refresh');
        }else {
            $this->m_category->insert_kategori($kategorinameanyar,$kategorisluganyar);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil menambahkan kategori post!</div>');
            redirect('admin/categories','refresh');
        }
    }
	
    public function getname() {
        $id = $this->input->get('id');
        $get_kategori_by_id = $this->m_category->get_category_by_id($id);
        $json = json_encode($get_kategori_by_id);
        echo $json;
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
	
	public function update_kategoriname_post() {
		$get_post = $this->m_post->get_post();
		foreach ($get_post->result() as $row) {
			$id_kategori = $row->kategori;
			$post_id = $row->id_post;
			$get_cat_id = $this->m_category->get_category_by_id($id_kategori);
			$hasil = $this->m_post->update_kategori_post($post_id,$get_cat_id['name']);
			if ($hasil) {
				// echo "berhasil update kategori.<br>";
			}
		}
	}
}