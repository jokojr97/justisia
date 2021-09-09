<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('m_home');
        $this->load->model('m_post');
        $this->load->model('m_category');
        $this->load->model('m_keyword');
        $this->load->model('m_program');
	}

	public function jajal() {
		$jajal = $this->m_post->coba_join();
		$jajal = json_encode($jajal->result()[1]);
		echo $jajal;
	}

	public function donasi() {
		$data['title'] = "Donasi - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["menu"] = "donasi"; 
		$data["url"] = base_url()."donasi";
		$data['berita_list'] = $this->m_post->get_posts_all();
		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/donasi', $data);
		$this->load->view('home/_partial/publikasi_footer');
	}

	public function podcast() {
		$data['title'] = "Podcast - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk, podcast";
		$data["url"] = base_url()."podcast";
		$data["menu"] = "podcast";
		$this->db->where('post_type', 21);
		$this->db->from('jsts_post');
		$trow = $this->db->count_all_results();
		// $trow = $this->db->count_all('jsts_post');

		//konfigurasi pagination
	    $config['base_url'] = site_url('home/podcast'); //site url
	    $config['total_rows'] =  $trow;//total row
	    $config['per_page'] = 12;  //show record per halaman
	    $config["uri_segment"] = 3;  // uri parameter
	    $choice = $config["total_rows"] / $config["per_page"];
	    $config["num_links"] = floor($choice);
	    
         // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->m_post->get_podcast_list($config["per_page"], $data['page']);      
 
        $data['pagination'] = $this->pagination->create_links();
        // var_dump($data);

		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/podcast', $data);
		$this->load->view('home/_partial/publikasi_footer');
	}

	public function index()
	{
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data['title'] = "Poverty Resource Center - PRCI";
		$data["menu"] = "home"; 
		$data["url"] = base_url();
		$data['berita_list'] = $this->m_post->get_beritas();
		$data['programs_list'] = $this->m_program->get_programs();
		$data['podcasts'] = $this->m_post->get_podcasts();
		$this->load->view('home/_partial/header', $data);
		$this->load->view('home/overview', $data);
	}
	public function map()
	{
		redirect('peta_kabupaten','refresh');
	}
	public function peta_desa_2020()
	{
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["url"] = base_url()."home/peta_desa_2020";
		$data["menu"] = "peta"; 
		$data['title'] = "Peta Data - ";
		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/peta_desa_2020', $data);
		$this->load->view('home/_partial/publikasi_footer');
	}
	public function peta()
	{
		redirect('peta_kabupaten','refresh');
	}
	public function peta_kabupaten()
	{
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["url"] = base_url()."home/peta_kabupaten";
		$data["menu"] = "peta"; 
		$data['title'] = "Peta Kabupatean - ";
		$kab = $this->uri->segment(3);
		$data['kabupaten'] = $kab;
		if (!$kab) {
			$data['kabupaten'] = "bojonegoro";
		}
		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/peta_kabupaten');
  		$this->load->view('home/_partial/publikasi_footer');
	}
	public function peta_kecamatan()
	{
		$data['title'] = "Peta Kecamatan - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["url"] = base_url()."home/peta_kecamatan";
		$data["menu"] = "peta"; 
		$kab = $this->uri->segment(3);
		if (!$kab) {
			$kab = $this->uri->segment(2);
			if (!$kab){
				$data['kabupaten'] = "bojonegoro";
			}
		}else {
			$data['kabupaten'] = $kab;
		}

		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/peta_kecamatan', $data);
		$this->load->view('home/_partial/publikasi_footer');
	}
	public function peta_pertanian()
	{
		$data['title'] = "Peta Pertanian - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["url"] = base_url()."peta_pertanian";
		$data["menu"] = "peta"; 
		$data['poster'] = $this->m_home->get_poster();
		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/peta_pertanian', $data);
		$this->load->view('home/_partial/publikasi_footer');
	}
	
	
	public function detail_poster(){
		$id = $this->uri->segment(3);
		$data['poster'] = $this->m_home->get_detail_poster($id);
		$data['berita_list'] = $this->m_post->get_posts_all();		
		$data["url"] = base_url()."home/detail_poster/".$id;
		$data["menu"] = "berita";
		$data['title'] = $data['poster']['title']." - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk, ".$data['poster']['title']; 
		
		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/poster_view', $data);

		// echo $query['id'];
	}

	
	public function peta_desa()
	{
		$data['title'] = "Peta Desa - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["menu"] = "peta"; 
		$kab = $this->uri->segment(3);
		if (!$kab) {
			$kab = $this->uri->segment(2);
			if (!$kab){
				$data['kabupaten'] = "bojonegoro";
			}
		}else {
			$data['kabupaten'] = $kab;
		}
		$data["url"] = base_url()."peta_desa/".$data['kabupaten'];
		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/peta_desa', $data);
		$this->load->view('home/_partial/publikasi_footer');
	}
	public function tentangkami()
	{
		$data['title'] = "Tentang Kami - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["menu"] = "tentangkami"; 
		$data["url"] = base_url()."tentangkami";
		$data['berita_list'] = $this->m_post->get_posts_all();
		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/tentang_kami', $data);
		$this->load->view('home/_partial/publikasi_footer');
	}
	public function hubungikami()
	{
		$data['title'] = "Hubungi Kami - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["url"] = base_url()."hubungikami";
		$data["menu"] = "hubungikami"; 
		$data['berita_list'] = $this->m_post->get_posts_all();
		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/hubungikami', $data);
		$this->load->view('home/_partial/publikasi_footer');
	}
	public function berita_view(){	
		$data['deskripsi'] = 1;	
		$id_berita = $this->uri->segment(3);
		if(!$id_berita) {
			$id_berita = $this->uri->segment(2);
		}
		$data['id_berita'] = $id_berita;
		$data['berita'] = $this->m_post->get_berita_id($id_berita);
		$post = $data['berita'];
		$data['berita_list'] = $this->m_post->get_posts_all();
		$data['category_list'] = $this->m_category->get_category();
		$data['posttype_list'] = $this->m_post->get_type_post();
		$data["url"] = base_url()."berita/".$id_berita;
		
		// var_dump($id_berita);
		if ($data['berita']) {	
			$posttype = $this->m_post->get_beritas_by_id($post['id_post']);
			$data["menu"] = $posttype['posttype_slug']; 
			$this->load->view('home/_partial/publikasi_header', $data);
			$this->load->view('home/berita_view', $data);
			$this->load->view('home/_partial/publikasi_footer');
		}else {
			redirect('berita/notfound','refresh');
		}
		// echo $id_berita;
	}

	public function podcast_view(){	
		$data['deskripsi'] = 1;	
		$id_berita = $this->uri->segment(3);
		if(!$id_berita) {
			$id_berita = $this->uri->segment(2);
		}
		$data['id_berita'] = $id_berita;
		$data['berita'] = $this->m_home->get_berita_id($id_berita);

		$data['berita_list'] = $this->m_post->get_posts_all();
		$data['category_list'] = $this->m_category->get_category();
		$data['posttype_list'] = $this->m_post->get_type_post();
		$data["url"] = base_url()."berita/".$id_berita;
		
		// var_dump($id_berita);
		if ($data['berita']) {			
			$data["menu"] = "podcast"; 
			$this->load->view('home/_partial/publikasi_header', $data);
			$this->load->view('home/podcastview', $data);
			$this->load->view('home/_partial/publikasi_footer');
		}else {
			redirect('berita/notfound','refresh');
		}
		// echo $id_berita;
	}

	public function beritanotfound(){
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["menu"] = "berita"; 
		$data["url"] = base_url()."berita/notfound";
		$data['title'] = "Not Found - ";
		$data['berita_list'] = $this->m_post->get_posts_all();
		$data['category_list'] = $this->m_category->get_category();
		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/berita_view_notfound', $data);
		$this->load->view('home/_partial/publikasi_footer');
	}

	public function berita(){
		$data['title'] = "Berita - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["url"] = base_url()."berita";
		$data["menu"] = "berita";
		$trow = $this->db->count_all('jsts_post');

		//konfigurasi pagination
	    $config['base_url'] = site_url('home/berita'); //site url
	    $config['total_rows'] =  $trow;//total row
	    $config['per_page'] = 12;  //show record per halaman
	    $config["uri_segment"] = 3;  // uri parameter
	    $choice = $config["total_rows"] / $config["per_page"];
	    $config["num_links"] = floor($choice);
	    
         // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->m_post->get_post_list($config["per_page"], $data['page']);      
 
        $data['pagination'] = $this->pagination->create_links();
        // var_dump($data);

		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/berita', $data);
	}
	public function dataJatim()
	{
		$data['title'] = "Data Jatim - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		// $id_bidang = 1;
		$bidang = $this->uri->segment(4);
		if (!$bidang) {
			$bidang = $this->uri->segment(3);
			$tahun = $this->uri->segment(2);
			if (!$bidang) {
				$bidang = 1;
			}
			if(!$tahun) {
				$tahun = 2019;
			}
		}else {
			if (!$bidang) {
				$bidang = 1;
			}
			$tahun = $this->uri->segment(3);
			if (!$tahun) {
				$tahun = 2019;
			}
		}
		$data["url"] = base_url()."datajatim/".$tahun."/".$bidang;
		$bid = $this->m_home->get_bidang_by_id($bidang);
		// $kat = $this->m_home->get_kategori_by_id($kategori);
		$des = $this->m_home->get_deskripsi_bid($bidang);
		$getbid = $this->m_home->get_bidang();

		foreach ($getbid->result() as $row) {
			$getkatbid = $this->m_home->get_kategori_by_bidang($row->id_bidang);
			$n = 0;	
			foreach ($getkatbid->result_array() as $rw) {
				$data['kategori_bidang'][$row->id_bidang][$n] = "<option value=".$rw['id_kategori_data'].">".$rw['nama_kategori']."</option>";		
				$n++;		
			}	
			$data['jumlah_bidang'][$row->id_bidang] = $this->m_home->count_bidang($row->id_bidang);
		}

		$data['tahun_data'] = $tahun;
		$data["menu"] = "data";
		$data['bidang'] = $getbid;
		$data['id_bidang_sekarang'] = $bid['id_bidang'];
		$data['bidang_sekarang'] = $bid['nama_bidang'];
		// $data['id_kategori_sekarang'] = $kat['id_kategori_data'];
		// $data['kategori_sekarang'] = $kat['nama_kategori'];
		$data['kategori_list'] = $this->m_home->get_kategori_by_bidang($bidang);
		$no = 0;
		foreach ($des->result() as $row) {			
			$katgori = $this->m_home->get_deskripsi_id($row->id_deskripsi)->row_array();
			$data['hasil'][$no] = $this->m_home->get_data_prov($tahun, $row->id_deskripsi);
			$data['kategori'][$no] = $katgori['nama_kategori'];
			$data['id_kategori'][$no] = $katgori['id_kategori'];

			$no++;
		}
		$data['kab'] = $this->m_home->get_kab();
		$data['hg1'] = 1;
		// var_dump($des);
		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view("home/dataJatim", $data);
  		$this->load->view('home/_partial/highchart', $data);
	}
	public function proses_cari(){
		$tahun = $this->input->post('tahun');
		$bidang = $this->input->post('bidang');
		$kategori = $this->input->post('kategori');
		if ($bidang == 2 ) {			
        	header("location:".base_url()."home/datajatim/2018/".$bidang."/".$kategori."");
		}else {
        	header("location:".base_url()."home/datajatim/".$tahun."/".$bidang."/".$kategori."");
		}
	}
	public function proses_cari_detail(){
		$kabupaten = $this->input->post('kabupaten');
		$bidang = $this->input->post('bidang');
		$kategori = $this->input->post('kategori');
    	header("location:".base_url()."home/detailkab/2015/2019/".$kabupaten."/".$bidang."/".$kategori."");
	}
	public function detailkab(){
		$data['title'] = "Kabupaten - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["menu"] = "data";
		$kategori = $this->uri->segment(7);
		if (!$kategori) {
			$kategori = 1;
		}
		$bidang = $this->uri->segment(6);
		if (!$bidang) {
			$bidang = 1;
		}
		$kabs = $this->uri->segment(5);
		if (!$kabs) {
			$kabs = 'data_kab1';
		}
		$tahun_akhir = $this->uri->segment(4);
		if (!$tahun_akhir) {
			$tahun_akhir = 2019;
		}
		$tahun_awal = $this->uri->segment(3);
		if (!$tahun_awal) {
			$tahun_awal = 2015;
		}
		
		$data["url"] = base_url()."home/detail_kab/".$tahun_awal."/".$tahun_akhir."/".$kabs."/".$bidang."/".$kategori;
		$bid = $this->m_home->get_bidang_by_id($bidang);
		$des = $this->m_home->get_deskripsi($bidang, $kategori);		
		$kb = $this->m_home->get_kab_id($kabs);
		$kat = $this->m_home->get_kategori_by_id($kategori);
		$kabupatens = $this->m_home->get_kab();		
		$getbid = $this->m_home->get_bidang();


		foreach ($getbid->result() as $row) {
			$getkatbid = $this->m_home->get_kategori_by_bidang($row->id_bidang);
			$n = 0;	
			foreach ($getkatbid->result_array() as $rw) {
				$data['kategori_bidang'][$row->id_bidang][$n] = "<option value=".$rw['id_kategori_data'].">".$rw['nama_kategori']."</option>";		
				$n++;		
			}	
			$data['jumlah_bidang'][$row->id_bidang] = $this->m_home->count_bidang($row->id_bidang);
		}

		$data['id_kabupaten_sekarang'] = $kb['kd_kab'];
		$data['kabupaten_sekarang'] = $kb['nama_kab'];
		$data['kabupatens'] = $kabupatens;
		$data['id_bidang_sekarang'] = $bid['id_bidang'];
		$data['bidang_sekarang'] = $bid['nama_bidang'];
		$data['id_kategori_sekarang'] = $kat['id_kategori_data'];
		$data['kategori_sekarang'] = $kat['nama_kategori'];
		$data['kategori_list'] = $this->m_home->get_kategori_by_bidang($bidang);
		$data['kabupat']['nama'] = $kb['nama_kab'];
		$data['hg1'] = 2;
		$data['tahun_awal'] = $tahun_awal;
		$data['tahun_akhir'] = $tahun_akhir;

		$data['bidang'] = $getbid;
		$kd_kab = $kb['kd_kab'];
		for ( $i=$tahun_awal;$i<=$tahun_akhir;$i++){
			$dta = $this->m_home->get_data_prov($i, $des['id_deskripsi']);
			$data['hasil'][$i] = $dta[$kd_kab];
		}

		$no=0;

		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view("home/detailkab", $data);
  		$this->load->view('home/_partial/highchart', $data);

	}

	public function ambil_data(){
		// $id = $this->input->get('id');
		$rst = $this->db->get('ambil_data');
		$result = array();

		foreach ($rst->result_array() as $value) {
			$result[] = $value;
		}

		echo json_encode($result);
	}
	public function searchproses(){
		$keyword = $this->input->post('keyword');
		$keyword = $this->make_slug($keyword);
		// $keyword = str_replace('-', ' ', $keyword);
		redirect('search/'.$keyword.'','refresh');
	}
	
	public function search() {
		$uri = $this->uri->segment(3);
		$segement = 4;
		if (!$uri) {
			$uri = $this->uri->segment(2);
			$segement = 4;
		}

		// $keyword = str_replace('-', ' ', $keyword);
		$search_unslug = str_replace('-', ' ', $uri);
		$search = $this->m_post->search($search_unslug);
		
		$data['title'] = "Pencarian - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["url"] = base_url()."search/".$uri;
		$data["menu"] = "berita";
		$data["text"] = $search_unslug;

		$data['berita_list'] = $this->m_post->get_posts_all();
		$data['category_list'] = $this->m_category->get_category();
		$data['posttype_list'] = $this->m_post->get_type_post();
		
		if($search) {
			$search = $this->m_post->search($search_unslug);
			
			$trow = count($search->result());

			//konfigurasi pagination
			$urls = 'home/search/'.$uri;

			$config['base_url'] = site_url($urls); //site url
			$config['total_rows'] =  $trow;//total row
			$config['per_page'] = 12;  //show record per halaman
			$config["uri_segment"] = $segement;  // uri parameter
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);

			// Membuat Style pagination untuk BootStrap v4
			$config['first_link']       = 'First';
			$config['last_link']        = 'Last';
			$config['next_link']        = 'Next';
			$config['prev_link']        = 'Prev';
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			
			
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment($segement)) ? $this->uri->segment($segement) : 0;
			
			$data['data'] = $this->m_post->get_post_list_search($search_unslug, $config["per_page"], $data['page']);
	
			$data['pagination'] = $this->pagination->create_links();
			// var_dump($data['data']);
			$this->load->view('home/_partial/publikasi_header', $data);
			$this->load->view('home/search', $data);
			$this->load->view('home/_partial/publikasi_footer');
		}else {
			redirect('berita/notfound','refresh');
		}

		
	}

	public function category() {
		$uri = $this->uri->segment(3);
		if (!$uri) {
			$uri = $this->uri->segment(2);
		}
		$get_kategori_id = $this->m_category->get_category_by_id($uri);

		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["url"] = base_url()."category/".$uri;
		$data["menu"] = "berita";
		$data['berita_list'] = $this->m_post->get_posts_all();
		$data['category_list'] = $this->m_category->get_category();
		$data['posttype_list'] = $this->m_post->get_type_post();

		if ($get_kategori_id){
			$slug = $get_kategori_id['slug'];
			$url = 'category/'.$slug;
			redirect($url, 'refresh');
		}else {	
			$get_kategori_slug = $this->m_category->get_kategori_by_slug($uri);
			if ($get_kategori_slug) {
				$id = $get_kategori_slug['id'];
				$kategori = $this->m_post->get_kategori($id);
				$data['kategori'] = $kategori;
				$data['text'] = $get_kategori_slug['name'];
				$data['title'] = $get_kategori_slug['name']." - ";

				$this->load->view('home/_partial/publikasi_header', $data);
				$this->load->view('home/category', $data);
				$this->load->view('home/_partial/publikasi_footer');
				// var_dump($kategori->result());
			}else {
				redirect('berita/notfound','refresh');				
			}
		}
	}

	public function posttipe() {
		$uri = $this->uri->segment(3);
		$segement = 4;
		if (!$uri) {
			$uri = $this->uri->segment(2);
			$segement = 4;
		}
		$get_posttipe_slug = $this->m_post->get_posttipe_by_slug($uri);
		$data["url"] = base_url()."posttipe/".$uri;
		$data['title'] = $get_posttipe_slug['posttype_name']." - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data['berita_list'] = $this->m_post->get_posts_all();
		$data['category_list'] = $this->m_category->get_category();
		$data['posttype_list'] = $this->m_post->get_type_post();
		
		if ($get_posttipe_slug) {
			$id = $get_posttipe_slug['id'];
			$posttipe = $this->m_post->get_posttipe($id);
			$data["menu"] = $get_posttipe_slug['posttype_slug'];
			
			$trow = count($posttipe->result());

			//konfigurasi pagination
			$urls = 'home/posttipe/'.$get_posttipe_slug['posttype_slug'];
			$config['base_url'] = site_url($urls); //site url
			$config['total_rows'] =  $trow;//total row
			$config['per_page'] = 9;  //show record per halaman
			$config["uri_segment"] = $segement;  // uri parameter
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);

			// Membuat Style pagination untuk BootStrap v4
			$config['first_link']       = 'First';
			$config['last_link']        = 'Last';
			$config['next_link']        = 'Next';
			$config['prev_link']        = 'Prev';
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
	 
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment($segement)) ? $this->uri->segment($segement) : 0;
			
			$data['data'] = $this->m_post->get_postipe_post_list($id, $config["per_page"], $data['page']);

			$data['pagination'] = $this->pagination->create_links();

			$data['posttipe'] = $posttipe;
			$data['text'] = $get_posttipe_slug['posttype_name'];
			$data['icon_posttipe'] = $get_posttipe_slug['posttype_icon'];

			$this->load->view('home/_partial/publikasi_header', $data);
			$this->load->view('home/posttipe', $data);
			$this->load->view('home/_partial/publikasi_footer');
			// echo $data['page'];
		}else {
			redirect('berita/notfound','refresh');
		}
	}

	
	public function tag() {
		$uri = $this->uri->segment(3);
		$segement = 4;
		if (!$uri) {
			$uri = $this->uri->segment(2);
			$segement = 4;
		}
		$get_tag_slug = $this->m_keyword->get_keyword_by_slug($uri);

		$data["url"] = base_url()."tag/".$uri;
		$data['title'] = $get_tag_slug['name']." - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["menu"] = "berita";
		$data['berita_list'] = $this->m_post->get_posts_all();
		$data['category_list'] = $this->m_category->get_category();
		$data['posttype_list'] = $this->m_post->get_type_post();

		if ($get_tag_slug) {
			$id = $get_tag_slug['id_keyword'];
			$name = $get_tag_slug['name'];
			$tag = $this->m_keyword->get_post_from_name($name);
			
			$trow = count($tag->result());

			//konfigurasi pagination
			$urls = 'home/tag/'.$get_tag_slug['slug'];
			$config['base_url'] = site_url($urls); //site url
			$config['total_rows'] =  $trow;//total row
			$config['per_page'] = 12;  //show record per halaman
			$config["uri_segment"] = $segement;  // uri parameter
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);

			// Membuat Style pagination untuk BootStrap v4
			$config['first_link']       = 'First';
			$config['last_link']        = 'Last';
			$config['next_link']        = 'Next';
			$config['prev_link']        = 'Prev';
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
	 
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment($segement)) ? $this->uri->segment($segement) : 0;
			
			$data['data'] = $this->m_keyword->get_tag_list($name, $config["per_page"], $data['page']);

			$data['pagination'] = $this->pagination->create_links();

			$data['tag'] = $tag;
			$data['text'] = $get_tag_slug['name'];

			$this->load->view('home/_partial/publikasi_header', $data);
			$this->load->view('home/tag', $data);
			$this->load->view('home/_partial/publikasi_footer');
			// echo $data['data'];
		}else {
			redirect('berita/notfound','refresh');
		}

	}
	
	public function program() {
		$uri = $this->uri->segment(3);
		$segement = 4;
		if (!$uri) {
			$uri = $this->uri->segment(2);
			$segement = 4;
		}
		$get_program_slug = $this->m_program->get_program_by_slug($uri);

		$data["url"] = base_url()."fokus-programs/".$uri;
		$data['title'] = $get_program_slug['name']." - ";
		$data['deskripsi'] = "Poverty Resouce Center Initiative (prci) - merupakan  komunitas masyarakat sipil (non-profit) yang bergerak pada isu kemiskinan, kesetaraan gender, kesehatan dan pertanian";
		$data['keyword'] = "justisia, Justisia-Institute, poverty, poverty resource center, prc, data, data bojonegoro, kemiskinan, bojonegoro, tuban, pertanian, gender, pupuk";
		$data["menu"] = "programs";
		$data['berita_list'] = $this->m_post->get_posts_all();
		$data['category_list'] = $this->m_category->get_category();
		$data['posttype_list'] = $this->m_post->get_type_post();

		if ($get_program_slug) {
			$id = $get_program_slug['id_program'];
			$name = $get_program_slug['name'];
			$tag = $this->m_post->get_post_from_program($name);
			
			$trow = count($tag->result());

			//konfigurasi pagination
			$urls = 'home/program/'.$get_program_slug['slug'];
			$config['base_url'] = site_url($urls); //site url
			$config['total_rows'] =  $trow;//total row
			$config['per_page'] = 8;  //show record per halaman
			$config["uri_segment"] = $segement;  // uri parameter
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);

			// Membuat Style pagination untuk BootStrap v4
			$config['first_link']       = 'First';
			$config['last_link']        = 'Last';
			$config['next_link']        = 'Next';
			$config['prev_link']        = 'Prev';
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
	 
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment($segement)) ? $this->uri->segment($segement) : 0;
			
			$data['data'] = $this->m_post->get_post_by_program_list($name, $config["per_page"], $data['page']);

			$data['pagination'] = $this->pagination->create_links();

			$data['tag'] = $tag;
			$data['text'] = $get_program_slug['name'];
			$data['header_judul'] = $get_program_slug['header_judul'];
			$data['header_isi'] = $get_program_slug['header_isi'];
			$data['header_penulis'] = $get_program_slug['header_penulis'];
			$data['poster_programs'] = $this->db->query('select * from `jsts_galeri`');
			// $data['poster_programs'] = $this->m_post->get_poster_programs($get_program_slug['name']);
			$this->load->view('home/_partial/publikasi_header', $data);
			$this->load->view('home/fokus_program', $data);
			$this->load->view('home/_partial/publikasi_footer');
			// echo $data['data'];
		}else {
			redirect('berita/notfound','refresh');
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
}
