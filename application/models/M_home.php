<?php
class M_home extends CI_Model{
	function get_bidang(){
		$hsl = $this->db->get('jsts_bidang_data');
		return $hsl;
	}
    //ambil data mahasiswa dari database
    function get_berita_list($limit, $start){
        $this->db->order_by('date_created', 'desc');
        $query = $this->db->get('jsts_post', $limit, $start);
        return $query;
    }
	function get_kab(){
		$hsl = $this->db->get('jsts_kab');
		return $hsl;
	}
	function get_kab_id($id){
		$hsl = $this->db->get_where('jsts_kab', ['kd_kab' => $id])->row_array();
		return $hsl;
	}
	function get_bidang_by_id($id){
		$hsl = $this->db->get_where('jsts_bidang_data', ['id_bidang' => $id])->row_array();
		return $hsl;
	}
	function get_kategori_by_bidang($id){
		$hsl = $this->db->get_where('jsts_kategori_data', ['id_bidang' => $id]);
		return $hsl;
	}
	function get_kategori_by_id($id){
		$hsl = $this->db->get_where('jsts_kategori_data', ['id_kategori_data' => $id])->row_array();
		return $hsl;
	}
	function get_deskripsi($id_bidang, $id_kategori){
		$hsl = $this->db->get_where('jsts_deskripsi_data', ['id_bidang' => $id_bidang, 'id_kategori' => $id_kategori])->row_array();
		return $hsl;
	}
	function get_deskripsi_bid($id_bidang){
		$hsl = $this->db->get_where('jsts_deskripsi_data', ['id_bidang' => $id_bidang]);
		return $hsl;
	}
	function get_data_prov($tahun, $id){
		$hsl = $this->db->get_where('jsts_data_prov', ['tahun' => $tahun, 'id_deskripsi' => $id])->row_array();
		return $hsl;
	}
	function get_data_prov_id($id){
		$hsl = $this->db->get_where('jsts_data_prov', ['id_deskripsi' => $id]);
		return $hsl;
	}
	function get_jsts_data_prov(){
		$hsl = $this->db->get('jsts_data_prov');
		return $hsl;
	}
	function get_deskripsi_id($id){
		$hsl = $this->db->get_where('jsts_deskripsi_data', ['id_deskripsi' => $id]);
		return $hsl;
	}
	function count_bidang($id){
		// $hsl = $this->db->get_where('jsts_deskripsi_data', ['id_deskripsi' => $id_bidang]);
		$this->db->where('id_bidang', $id);
		$this->db->from('jsts_kategori_data');
		$hsl = $this->db->count_all_results();
		return $hsl;
	}

	function get_poster(){
		$hsl = $this->db->get('jsts_galeri');
		return $hsl;
	}
	function get_detail_poster($id){
		$hsl = $this->db->get_where('jsts_galeri', ['slug' => $id])->row_array();
		return $hsl;
	}

	function get_post_list($limit, $start){
		$this->db->order_by('id_post', 'DESC');
        $query = $this->db->get_where('jsts_post', ['post_type' => 1], $limit, $start);
        return $query;
    }

}