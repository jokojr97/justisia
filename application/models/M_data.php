<?php
class M_data extends CI_Model{
	public function get_data_gender($kab, $tahun){
		$hsl = $this->db->get_where('jsts_data_gender', ['nama_kabupaten' => $kab, 'tahun' => $tahun ]);
		return $hsl;
	}	
}