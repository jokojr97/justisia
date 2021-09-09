<?php
class M_admin extends CI_Model{

	function get_profil_by_kode($email){
		$hsl = $this->db->get_where('jsts_user', ['email' => $email])->row_array();
		return $hsl;
	}
	function get_profil_by_id($id){
		$hsl = $this->db->get_where('jsts_user', ['id' => $id])->row_array();
		return $hsl;
	}
	function get_aspirasi_by_id($id){
		$hsl = $this->db->get_where('jsts_aspirasi', ['id' => $id])->row_array();
		return $hsl;
	}
	function get_aspirasi_proses(){
		$hsl = $this->db->query("SELECT * FROM `jsts_aspirasi` WHERE `subject` != 'jawaban' AND `is_active` = 1 ORDER BY id DESC");
		return $hsl;
	}
	function get_aspirasi_selesai(){
		$hsl = $this->db->query("SELECT * FROM `jsts_aspirasi` WHERE `subject` != 'jawaban' AND `is_active` = 2 ORDER BY id DESC");
		return $hsl;
	}
	function count_aspirasi_laki2(){
		$this->db->where('role_id', 3);
		$this->db->where('jenis_kelamin', 'Laki-Laki');
		$this->db->from('jsts_aspirasi');
		$hsl = $this->db->count_all_results();
		return $hsl;
	}
	function count_aspirasi_perempuan(){
		$this->db->where('role_id', 3);
		$this->db->where('jenis_kelamin', 'Perempuan');
		$this->db->from('jsts_aspirasi');
		$hsl = $this->db->count_all_results();
		return $hsl;
	}
	function get_pengguna(){
		$hsl = $this->db->get_where('jsts_user', ['is_active' => 1]);
		return $hsl;
	}
	function get_datatable($sql){
		$hsl = $this->db->query($sql);
 		return $hsl;
	}
	function update_status_aspirasi($id){
		$this->db->set('is_active', 2);
		$this->db->where('id', $id);
		$hsl = $this->db->update('jsts_aspirasi');
		return $hsl;
	}
	function nonaktifkan_user($id){
		$this->db->set('is_active', 0);
		$this->db->where('id', $id);
		$hsl = $this->db->update('jsts_user');
		return $hsl;
	}
	function edit_user_by_id($id,$uname,$nama,$email,$jk,$role){
		$this->db->set('username', $uname);
		$this->db->set('email', $email);
		$this->db->set('nama', $nama);
		$this->db->set('role_id', $role);
		$this->db->set('jenis_kelamin', $jk);
		$this->db->where('id', $id);
		$hsl = $this->db->update('jsts_user');
		return $hsl;
	}
	function simpan_berita($id_user,$judul,$isi,$gambar,$nama_user,$is_active,$tanggal,$sumber,$posttype,$tags,$exercipt,$postslug,$posttype_name,$programs){
		$data = [
			"id_user" => $id_user,			
			"judul" => $judul,			
			"deskripsi" => $isi,
			"featured_image" => $gambar,
			"post_type" => $posttype,
			"post_type_name" => $posttype_name,
			"nama_user" => $nama_user,
			"sumber_foto" => $sumber,
			"slug" => $postslug,
			"is_active" => $is_active,
			"keywords" => $tags,
			"programs" => $programs,
			"exercipt" => $exercipt,
			"date_created" => $tanggal,
		];
		$this->db->insert('jsts_post', $data);
	}
	function update_berita($id, $id_user,$judul,$isi,$gambar,$nama_user,$is_active,$tanggal,$sumber,$posttype,$tags,$exercipt,$postslug,$posttype_name,$programs){
		$data = [
			"id_user" => $id_user,			
			"judul" => $judul,			
			"deskripsi" => $isi,
			"featured_image" => $gambar,
			"post_type" => $posttype,
			"post_type_name" => $posttype_name,
			"nama_user" => $nama_user,
			"sumber_foto" => $sumber,
			"slug" => $postslug,
			"is_active" => $is_active,
			"keywords" => $tags,
			"programs" => $programs,
			"exercipt" => $exercipt,
			"date_created" => $tanggal,
		];
		$this->db->where('id_post', $id);
		$this->db->update('jsts_post', $data);
	}
	function update_berita_no_img($id, $id_user,$judul,$isi,$nama_user,$is_active,$tanggal,$sumber,$posttype,$tags,$exercipt,$postslug,$posttype_name,$programs){
		$data = [
			"id_user" => $id_user,			
			"judul" => $judul,			
			"deskripsi" => $isi,
			"post_type" => $posttype,
			"post_type_name" => $posttype_name,
			"nama_user" => $nama_user,
			"sumber_foto" => $sumber,
			"slug" => $postslug,
			"is_active" => $is_active,
			"keywords" => $tags,
			"programs" => $programs,
			"exercipt" => $exercipt,
			"date_created" => $tanggal,		
		];
		$this->db->where('id_post', $id);
		$this->db->update('jsts_post', $data);
	}
	function get_berita_id($id){
		$hasil = $this->db->get_where('jsts_post', ['id_post' => $id])->row_array();
		return $hasil;
	}
	
	//update 2.0
	public function count_post(){
		$hsl = $this->db->count_all_results('jsts_post');
		return $hsl;
	}
	public function count_page(){
		$hsl = $this->db->count_all_results('jsts_pages');
		return $hsl;
	}
	public function count_category(){
		$hsl = $this->db->count_all_results('jsts_category');
		return $hsl;
	}
	public function count_posttype(){
		$hsl = $this->db->count_all_results('jsts_posttype');
		return $hsl;
	}
	public function latest_post(){
		$this->db->order_by('id_post', 'DESC');
		$this->db->limit(4);
		$hsl = $this->db->get('jsts_post');
		return $hsl;		
	}
	public function get_type_post_by_id($id){	
		$hsl = $this->db->get_where('jsts_posttype', ['id' => $id])->row_array();
		return $hsl;	
	}
	public function hapus_berita($id) {
		$hsl = $this->db->delete('jsts_post', array('id_post' => $id));
		return $hsl;
	}
}