<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('upload');        
        $this->load->model('m_keyword');
        $this->load->model('m_post');
        $this->load->model('m_keyword');
        $this->load->helper('file');
		$role_id = $this->session->userdata('role_id');
		if ($role_id == 2) {					
		} else if ($role_id == 1) {			
			redirect('adminsuper','refresh');	
		} else {
			redirect('auth','refresh');
		}
	}

    function get_tags_json() {
        $json = $this->m_keyword->get_all();
        $json = json_encode($json);
        echo $json;
    }

    public function index(){
        // echo "halaman admin page index";
		$this->session->set_flashdata('breadcrumb', 'Tags');
		$this->session->set_flashdata('menu', 'category');
		$this->session->set_flashdata('menuName', 'List Tags');
		$this->session->set_flashdata('icon', 'far fa-file-alt');
		$data['tag'] = $this->m_keyword->get_all();
		// $data['kategori'] = $this->m_admin->kategori();
		$this->load->view('admin/tags', $data);
        // $des = $data['cat'];
        // $des = json_encode($des);
        // echo $des;
    }

    public function hapus() {
        $id = $this->uri->segment(4);
        $hapus = $this->m_keyword->hapus($id);
        if ($hapus) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil menghapus kategori!</div>');
            redirect('admin/tags','refresh');
        }
		// echo $id;
    }
	  
    public function insert() {
        $tags = $this->input->get('tags');
        $tagsslug = $this->make_slug($tags);
        $get_tags_by_slug = $this->m_keyword->get_keyword_by_slug($tagsslug);
        if(!$get_tags_by_slug) {
            $inputtags = $this->m_keyword->insert_keyword($tags,$tagsslug);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil menambahkan Kategori!</div>');
            redirect('admin/tags','refresh');
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kategori sudah ada!</div>');
            redirect('admin/tags','refresh');
        }
    }

    public function update() {
        $tagnameanyar = $this->input->get('nameanyar');
        $tagnamelawas = $this->input->get('namelawas');
        $tagsluglawas = $this->make_slug($tagnamelawas);
        $tagsluganyar = $this->make_slug($tagnameanyar);
        $get_tag_by_slug = $this->m_keyword->get_keyword_by_slug($tagsluglawas);
        
		if($get_tag_by_slug) {
            $id = $get_tag_by_slug['id_keyword'];
            $this->m_keyword->update($id,$tagnameanyar,$tagsluganyar);
			// $this->update_keyword_post();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil merubah tag post!</div>');
            redirect('admin/tags','refresh');
        }else {
            $this->m_keyword->insert_tag($tagnameanyar,$tagsluganyar);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil menambahkan kategori post!</div>');
            redirect('admin/tags','refresh');
        }
    }
	
    public function getname() {
        $id = $this->input->get('id');
        $get_tag_by_id = $this->m_keyword->get_tag_by_id($id);
        $json = json_encode($get_tag_by_id);
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
	
	public function update_keyword_post() {
		$get_post = $this->m_post->get_post();
        $no = 0;
		foreach ($get_post->result() as $row) {
			$keywords = $row->keywords;
            $keyword = explode(',', $keywords);
            $n = 0;
            foreach ($keyword as $result){
                $result = trim($result);
                $results[$no][$n]['name'] = $result;
                $results[$no][$n]['slug'] = $this->make_slug($result);
                $name = $results[$no][$n]['name'];
                $slug = $results[$no][$n]['slug'];

                $slug_alredy_exist = $this->m_keyword->get_keyword_by_slug($slug);
                if (!$slug_alredy_exist) {
                    if (!$name == "") {
                        $this->m_keyword->insert_keyword($name,$slug);
                    }
                    echo "berhasil update keyword <br>";
                }else {
                    echo "keyword sudah ada. <br>";
                }
                $n++;
            }
            $no++;
		}
        // $key = json_encode($results);
        // echo $key;
	}


}