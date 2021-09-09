<?php
class M_keyword extends CI_Model{
	function get_all(){
		$this->db->order_by('id_keyword', 'DESC');
		$hsl = $this->db->get('jsts_keywords');
		$no = 0;
		foreach ($hsl->result() as $row){
			$jml_post = 0;
			$hasils[$no]['id'] = $row->id_keyword;
			$hasils[$no]['name'] = $row->name;
			$hasils[$no]['slug'] = $row->slug;
			$hasils[$no]['created_at'] = $row->date_created;
			$hasil = $this->get_post_from_name($row->name);
			foreach($hasil->result() as $rw){
				$hasils[$no]['post'][$jml_post]['id'] = $rw->id_post;
				$hasils[$no]['post'][$jml_post]['judul'] = $rw->judul;
				$hasils[$no]['post'][$jml_post]['slug'] = $rw->slug;
				$hasils[$no]['post'][$jml_post]['keywords'] = $rw->keywords;
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

    function get_keyword_by_slug($id) {
		$hsl = $this->db->get_where('jsts_keywords', ['slug' => $id])->row_array();
		return $hsl;
    }
	function get_post_from_id($id){
		// $hsl = $this->db->get_where('jsts_keywords', ['id_keyword' => $id]);
		$hsl = $this->db->query("SELECT * FROM `jsts_post` WHERE `keywords` LIKE '%".$id."%'");
		return $hsl;
	}
	function get_post_from_name($id){
		// $hsl = $this->db->get_where('jsts_keywords', ['id_keyword' => $id]);
		$hsl = $this->db->query("SELECT * FROM `jsts_post` WHERE `keywords` LIKE '%".$id."%'");
		return $hsl;
	}
	
	function get_tag_list($name, $limit, $start){
		$query = "SELECT * FROM `jsts_post` JOIN jsts_posttype ON jsts_posttype.id = jsts_post.post_type  WHERE `keywords` LIKE '%".$name."%' ORDER BY `jsts_post`.`id_post` DESC LIMIT ".$start.", ".$limit."";
		$hsl = $this->db->query($query);
		return $hsl;
    }

	function get_tag_by_id($id){
		$hsl = $this->db->get_where('jsts_keywords', ['id_keyword' => $id])->row_array();
		return $hsl;
	}
	
    function insert_keyword($name,$slug) {
		$data = [
			"name" => $name,			
			"slug" => $slug,	
			"date_created" => date("Y-m-d h:i:s"),
			"updated_at" => date("Y-m-d h:i:s"),
		];
		$this->db->insert('jsts_keywords', $data);
    }

	function hapus($id) {
		$hsl = $this->db->delete('jsts_keywords', array('id_keyword' => $id));
		return $hsl;
	}

    function update($id,$tagname,$tagslug) { 
		$data = [
			"name" => $tagname,
			"slug" => $tagslug,
			"updated_at" => date("Y-m-d h:i:s"),
		];
		$this->db->where('id_keyword', $id);
		$this->db->update('jsts_keywords', $data);
    }

}