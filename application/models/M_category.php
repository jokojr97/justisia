<?php
class M_category extends CI_Model{
	function get_category(){
		$this->db->order_by('id', 'DESC');
		$hsl = $this->db->get('jsts_category');
		$no = 0;
		foreach ($hsl->result() as $row){
			$jml_post = 0;
			$hasil = $this->get_post_from_idcategory($row->id);
			$hasils[$no]['id'] = $row->id;
			$hasils[$no]['name'] = $row->name;
			$hasils[$no]['slug'] = $row->slug;
			$hasils[$no]['created_at'] = $row->created_at;
			foreach($hasil->result() as $rw){
				$hasils[$no]['post'][$jml_post]['id'] = $rw->id_post;
				$hasils[$no]['post'][$jml_post]['judul'] = $rw->judul;
				$hasils[$no]['post'][$jml_post]['slug'] = $rw->slug;
				$hasils[$no]['post'][$jml_post]['kategori'] = $rw->kategori;
				$hasils[$no]['post'][$jml_post]['date_created'] = $rw->date_created;
				// $hasils[$no]['post']['deskripsi'] = $rw->deskripsi;
				$jml_post++;
			}
			$hasils[$no]['jml_post'] = $jml_post;
			$no++;
		}
		return $hasils;
	}

	function get_post_from_idcategory($id){
		$hsl = $this->db->get_where('jsts_post', ['kategori' => $id]);
		return $hsl;
	}
	
	function get_category_by_id($id){
		$hsl = $this->db->get_where('jsts_category', ['id' => $id])->row_array();
		return $hsl;
	}
	
	function get_kategori_by_slug($kategorislug) {
		$hsl = $this->db->get_where('jsts_category', ['slug' => $kategorislug])->row_array();
		return $hsl;
	}

	function insert_category($kategoriname, $kategorislug) {
		$data = [
			"name" => $kategoriname,			
			"slug" => $kategorislug,	
			"created_at" => date("Y-m-d h:i:s"),	
			"updated_at" => date("Y-m-d h:i:s"),	
		];
		$this->db->insert('jsts_category', $data);
	}
	
    function update($id,$kategoriname,$kategorislug) { 
		$data = [
			"name" => $kategoriname,
			"slug" => $kategorislug,
			"updated_at" => date("Y-m-d h:i:s"),
		];
		$this->db->where('id', $id);
		$this->db->update('jsts_category', $data);
    }

	function hapus($id) {
		$hsl = $this->db->delete('jsts_category', array('id' => $id));
		return $hsl;
	}
}