<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->library('form_validation');
        $this->load->model('m_admin');
        $this->load->library('upload');        
        $this->load->model('m_home');
        $this->load->model('m_post');
        $this->load->model('m_category');
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

	public function index()
	{
		$this->session->set_flashdata('breadcrumb', 'Dashboard');
		$this->session->set_flashdata('menu', 'dashboard');
		$this->session->set_flashdata('menuName', 'Dashboard');
		$this->session->set_flashdata('icon', 'fas fa-tachometer-alt');
		$data['post'] = $this->m_admin->count_post();
		$data['pages'] = $this->m_admin->count_page();
		$data['kategori'] = $this->m_category->get_category();
		$data['posttype'] = $this->m_admin->count_posttype();
		$data['category'] = $this->m_admin->count_category();
		$data['latest'] = $this->m_admin->latest_post();
		// $data['kategori'] = $this->m_admin->kategori();
		$this->load->view('admin/overview', $data);
	}
	public function update_kategoriname_post() {
		$get_post = $this->m_post->get_post();
		foreach ($get_post->result() as $row) {
			$id_kategori = $row->kategori;
			$post_id = $row->id_post;
			$get_cat_id = $this->m_category->get_category_by_id($id_kategori);
			$hasil = $this->m_post->update_kategori_post($post_id,$get_cat_id['name']);
			if ($hasil) {
				echo "berhasil update kategori.<br>";
			}
		}
	}
	public function update_posttypename_post() {
		$get_post = $this->m_post->get_post();
		foreach ($get_post->result() as $row) {
			$id_kategori = $row->post_type;
			$post_id = $row->id_post;
			$get_type_id = $this->m_post->get_posttype_by_id($id_kategori);
			$hasil = $this->m_post->update_posttype_post($post_id,$get_type_id['posttype_name']);
			if ($hasil) {
				echo "berhasil update kategori.<br>";
			}
		}
	}
	public function data_provinsi()
	{
		$this->session->set_flashdata('breadcrumb', 'List Data Kab');
		$this->session->set_flashdata('menu', 'data_provinsi');
		$this->session->set_flashdata('menuName', 'List Data Kab');
		$this->session->set_flashdata('icon', 'fas fa-chart-pie');
		
		$data['brita'] = $this->m_home->get_posts_all();
		$data['kabupaten'] = $this->m_home->get_kab();
		$data['data_prov'] = $this->m_home->get_jsts_data_prov();
		
		$this->load->view('admin/data_provinsi', $data);			
	}
	public function berita(){	
		$this->session->set_flashdata('breadcrumb', 'List Berita');
		$this->session->set_flashdata('menu', 'berita');
		$this->session->set_flashdata('menuName', 'List Berita');
		$this->session->set_flashdata('icon', 'fas fa-newspaper');

		$data['brita'] = $this->m_post->get_posts_all();
		
		$this->load->view('admin/berita', $data);			
	}
	public function editberita(){	
		// inisiasi validasi
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim',[
			'required' => 'Judul Harus Diisi',
		]);
		$this->form_validation->set_rules('isi', 'isi', 'required|trim',[
			'required' => 'isi Harus Diisi',
		]);

		// validasi form
		if ($this->form_validation->run() == true) {
			// jika validasi benar
			$this->_updateberita();
		}else {
			// jika validasi salah
			$id = $this->uri->segment(3);
			$email = $this->session->userdata('email');
			$user = $this->db->get_where('jsts_user', ['email' => $email])->row_array();
			$data['id_user'] = $user['id'];
			$data['id_berita'] = $id;
			$data['nama_user'] = $user['nama'];
			$data['posttypes'] = $this->m_post->get_type_post_all();
			$data['berita'] = $this->m_post->get_berita_id($id);
			$data['berita']['tipepost'] = $this->m_admin->get_type_post_by_id($data['berita']['post_type']);
			$tags = $data['berita']['keywords'];
			$tags = explode(',', $tags);
			$no = 0;
			foreach ($tags as $result) {
				$slugid = $this->make_tag_id($result);
				$slug = $this->make_slug($result);
				$keyword[$no]['slug'] = $slug;
				$keyword[$no]['name'] = $result;
				$keyword[$no]['id'] = $slugid;
				$no++;
			}
			$data['berita']['tags'] = $keyword;
			$this->session->set_flashdata('breadcrumb', 'Edit Berita');
			$this->session->set_flashdata('menu', 'editberita');
			$this->session->set_flashdata('menuName', 'Edit Berita');
			$this->session->set_flashdata('icon', 'fas fa-newspaper');
			// tampilkan view editberita
			$this->load->view('admin/editberita', $data);
			// var_dump($keyword);
		}		
	}
	public function tambah_berita()
	{
		// inisiasi validasi
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim',[
			'required' => 'Judul Harus Diisi',
		]);
		$this->form_validation->set_rules('isi', 'isi', 'required|trim',[
			'required' => 'isi Harus Diisi',
		]);
		
		// validasi form
		if ($this->form_validation->run() == false) {
			// jika validasi tidak terjadi
			$email = $this->session->userdata('email');
			$user = $this->db->get_where('jsts_user', ['email' => $email])->row_array();
			$data['id_user'] = $user['id'];
			$data['nama_user'] = $user['nama'];
			$data['kategori'] = $this->m_category->get_category();
			$data['posttypes'] = $this->m_post->get_type_post_all();
			$this->session->set_flashdata('breadcrumb', 'Input Berita');
			$this->session->set_flashdata('menu', 'tambah_berita');
			$this->session->set_flashdata('menuName', 'Input Berita');
			$this->session->set_flashdata('icon', 'fas fa-newspaper');
			// tampilkan view input berita
			$this->load->view('admin/input_berita', $data);
		}else {
			// jika validasi benar
			$this->_addBerita();
			// var_dump($this->input->post('programs'));
		}
		
	}

	private function _addBerita() {
		// mengambil hasil inputan
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$tanggal = $this->input->post('tanggal');
		$posttype = $this->input->post('posttype');
		$programs = $this->input->post('programs');
		$sumber = $this->input->post('sumber');
		$tags = $this->input->post('tags');
		$id_user =  $this->input->post('id_user');
		$nama_user =  $this->input->post('nama_user');
		$is_active = 1;

		// membuat slug url
		$postslug = $this->make_slug($judul);
		
		// mendapatkan data posttype
		$get_posttype_by_id = $this->m_post->get_posttype_by_id($posttype);
		if($get_posttype_by_id) {
			$posttype_id = $get_posttype_by_id['id'];
			$posttype_name = $get_posttype_by_id['posttype_name'];
		}

		// membuat slug program
		$pr = "";
		$no = 0;
		if($programs){
			foreach($programs as $result){
				if($no == 0){
					$pr = $result;
				}else {
					$pr = $pr.",".$result;
				}
				$no++;
			}
		}
		$programs = $pr;
		
		// membuat slug keyword
		$tg = "";
		$no = 0;
		foreach($tags as $result) {
			// membuat slug keyword
			$keywordslug = $this->make_slug($result);
			// jika keyword belum ada
			$get_keyword_by_slug = $this->m_keyword->get_keyword_by_slug($keywordslug);
			if(!$get_keyword_by_slug){
				$this->m_keyword->insert_keyword($result,$keywordslug);
			}
			if($no == 0){
				$tg = $result;
			}else {
				$tg = $tg.",".$result;
			}
			$no++;
		}
		
		$tags = $tg;
		// membuat excercipt
		$exercipt = $this->make_exercipt($isi);

		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['gambar']['name'])){
	    	if ($this->upload->do_upload('gambar')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/images/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 800;
	            $config['height']= 600;
	            $config['new_image']= './assets/images/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];

				$this->m_admin->simpan_berita($id_user,$judul,$isi,$gambar,$nama_user,$is_active,$tanggal,$sumber,$posttype,$tags,$exercipt,$postslug,$posttype_name, $programs);
				redirect('admin/berita','refresh');
			}else {				
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar gagal diupload!</div>');
		    	redirect('admin/tambah_berita','refresh');	    					
			}

	    }else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar tidak tersedia, mohon tambahkan gambar thumbnail!</div>');
	    	redirect('admin/tambah_berita','refresh');	    	

	    }
	}

	private function _updateberita(){
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$tanggal = $this->input->post('tanggal');
		$posttype = $this->input->post('posttype');
		$programs = $this->input->post('programs');
		$sumber = $this->input->post('sumber');
		$tags = $this->input->post('tags');
		$id_user =  $this->input->post('id_user');
		$nama_user =  $this->input->post('nama_user');
		// membuat slug url
		$postslug = $this->make_slug($judul);

		
		// membuat slug program
		$pr = "";
		$no = 0;
		if($programs){
			foreach($programs as $result){
				if($no == 0){
					$pr = $result;
				}else {
					$pr = $pr.",".$result;
				}
				$no++;
			}
		}
		$programs = $pr;
		
		// get posttype by id
		$get_posttype_by_id = $this->m_post->get_posttype_by_id($posttype);
		if($get_posttype_by_id) {
			$posttype_id = $get_posttype_by_id['id'];
			$posttype_name = $get_posttype_by_id['posttype_name'];
		}

		// membuat slug keyword
		$tg = "";
		$no = 0;
		foreach($tags as $result) {
			// membuat slug keyword
			$keywordslug = $this->make_slug($result);
			// jika keyword belum ada
			$get_keyword_by_slug = $this->m_keyword->get_keyword_by_slug($keywordslug);
			if(!$get_keyword_by_slug){
				$this->m_keyword->insert_keyword($result,$keywordslug);
			}
			if($no == 0){
				$tg = $result;
			}else {
				$tg = $tg.",".$result;
			}
			$no++;
		}
		
		$tags = $tg;
		// membuat excercipt
		$exercipt = $this->make_exercipt($isi);
        $is_active = 1;

		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	    $this->upload->initialize($config);
	    if(!empty($_FILES['gambar']['name'])){
	    	if ($this->upload->do_upload('gambar')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/images/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 800;
	            $config['height']= 600;
	            $config['new_image']= './assets/images/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];

				$this->m_admin->update_berita($id, $id_user,$judul,$isi,$gambar,$nama_user,$is_active,$tanggal,$sumber,$posttype,$tags,$exercipt,$postslug,$posttype_name,$programs);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Update Post!</div>');
				redirect('admin/berita','refresh');
			}else {				
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar gagal diupload!</div>');
		    	redirect('admin/tambah_berita','refresh');
			}

	    }else {	    	
			$this->m_admin->update_berita_no_img($id, $id_user,$judul,$isi,$nama_user,$is_active,$tanggal,$sumber,$posttype,$tags,$exercipt,$postslug,$posttype_name,$programs);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Update Post!</div>');
			redirect('admin/berita','refresh');
	    }
	}

	public function hapusberita(){
		$id = $this->uri->segment(3);
		$this->m_admin->hapus_berita($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Post!</div>');
		redirect('admin/berita','refresh');
	}

	private function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }

	private function make_tag_id($string) {
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

	private function make_exercipt($isi) {
		$exercipt = $this->limit_words($isi, 20);	
		$exercipt = str_replace("<p>","",$exercipt);
		$exercipt = str_replace("<strong>","",$exercipt);
		$exercipt = str_replace("</strong>","",$exercipt);
		$exercipt = str_replace("&ndash;","-",$exercipt);
		$exercipt = str_replace("&nbsp;"," ",$exercipt);
		$exercipt = str_replace("</p>","",$exercipt);
		return $exercipt;
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


}