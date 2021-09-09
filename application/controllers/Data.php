<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		// $this->load->library('form_validation');
  //       $this->load->library('pagination');
        $this->load->model('m_data');		
	}

	public function index()
	{		
		redirect('data/gender','refresh');
	}
	public function cariGender()
	{		
		$tahun = $this->input->post('tahun');
		$kabupaten = $this->input->post('kabupaten');
		$kategori = $this->input->post('kategori');
		$url = "data/gender/".$tahun."/".$kabupaten."/".$kategori;
		redirect($url,'refresh');
	}
	public function gender()
	{
		$tahun = $this->uri->segment(3);
		$kabupaten = $this->uri->segment(4);
		$kategori = $this->uri->segment(5);
		if (!$tahun) {
			$tahun = 2019;
		}
		if (!$kabupaten) {
			$kabupaten = 'bojonegoro';
		}

		$get_gender = $this->m_data->get_data_gender($kabupaten, $tahun);
		$i = 0;
		foreach ($get_gender->result() as $row) {
			$data['genders'][$i]['kat'] = $row->kategori;
			$data['genders'][$i]['jum'] = $row->jumlah;
			$data['genders'][$i]['fisik'] = $row->fisik;
			$data['genders'][$i]['psikis'] = $row->psikis;
			$data['genders'][$i]['penelantaran'] = $row->penelantaran;
			$data['genders'][$i]['pemerkosaan'] = $row->pemerkosaan;
			$data['genders'][$i]['persetubuhan'] = $row->persetubuhan;
			$data['genders'][$i]['pencabulan'] = $row->pencabulan;
			$data['genders'][$i]['melahirkan_anak_di_bawah_umur'] = $row->melahirkan_anak_di_bawah_umur;
			$data['genders'][$i]['kenakalan'] = $row->kenakalan;
			$data['genders'][$i]['pekerja_anak'] = $row->pekerja_anak;
			$data['genders'][$i]['hak_asuh_anak'] = $row->hak_asuh_anak;
			$data['genders'][$i]['lain_lain'] = $row->lain_lain;
			$i++;
		}

		$data['data_gender'] = $get_gender;
		$data['tahun'] = $tahun;
		$data['kabupaten'] = ucfirst($kabupaten);
		$data["menu"] = "data"; 
		$this->load->view('data/_partial/header', $data);
		$this->load->view('data/gender', $data);
		$this->load->view('data/_partial/footer');
		$this->load->view('data/_partial/highchart', $data);

	}
}
