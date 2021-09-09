<?php
class M_post extends CI_Model{
	
	function get_post(){
		$this->db->order_by('id_post', 'DESC');
		$hsl = $this->db->get('jsts_post');
		return $hsl;
	}

    function get_posttype_by_id($id) {
        $hsl = $this->db->get_where('jsts_posttype', ['id' => $id])->row_array();
        return $hsl;
    }

    function update_kategori_post($id,$kategori_name) { 
		$data = [
			"kategori_name" => $kategori_name,
		];
		$this->db->where('id_post', $id);
		$this->db->update('jsts_post', $data);
    }

    function update_posttype_post($id,$kategori_name) { 
		$data = [
			"post_type_name" => $kategori_name,
		];
		$this->db->where('id_post', $id);
		$this->db->update('jsts_post', $data);
    }

    function get_tipe_by_id($id) { 
		$hsl = $this->db->get_where('jsts_posttype', ['id' => $id])->row_array();
		return $hsl;
    }

    function get_tipe_by_slug($id) { 
		$hsl = $this->db->get_where('jsts_posttype', ['posttype_slug' => $id])->row_array();
		return $hsl;
    }

    function update_tipe($id,$tipename,$tipeslug) { 
		$data = [
			"posttype_name" => $tipename,
			"posttype_slug" => $tipeslug,
			"updated_at" => date("Y-m-d h:i:s"),
		];
		$this->db->where('id', $id);
		$this->db->update('jsts_posttype', $data);
    }

    function insert_tipe($tipename,$tipeslug) { 
		$data = [
			"posttype_name" => $tipename,
			"posttype_slug" => $tipeslug,
			"created_at" => date("Y-m-d h:i:s"),
			"updated_at" => date("Y-m-d h:i:s"),
		];
		$this->db->insert('jsts_posttype', $data);
    }

	function hapus_tipe($id) {
		$hsl = $this->db->delete('jsts_posttype', array('id' => $id));
		return $hsl;
	}

	public function get_post_from_idpostype($id) {
		$hsl = $this->db->get_where('jsts_post', ['post_type' => $id]);
		return $hsl;
	}

	public function get_type_post_obj() {
		$hsl = $this->db->get('jsts_posttype');
		return $hsl;
	}
	
	public function coba_join() {
		$this->db->select('*');
		$this->db->from('jsts_post');
		$this->db->join('jsts_posttype', 'jsts_posttype.id = jsts_post.post_type');
		$query = $this->db->get();
		return $query;
	}
	
	public function get_type_post_all(){	
		$hsl = $this->db->get('jsts_posttype');
		return $hsl;	
	}
	public function get_type_post(){
		$this->db->order_by('id', 'ASC');
		$hsl = $this->db->get('jsts_posttype');
		$no = 0;
		foreach ($hsl->result() as $row){
			$jml_post = 0;
			$hasil = $this->get_post_from_idpostype($row->id);
			$hasils[$no]['id'] = $row->id;
			$hasils[$no]['posttype_name'] = $row->posttype_name;
			$hasils[$no]['posttype_slug'] = $row->posttype_slug;
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
	

	public function get_kategori($id) {
		$hsl = $this->db->get_where('jsts_post', ['kategori' => $id]);
		return $hsl;
	}

	public function get_posttipe_by_slug($id) {
		$hsl = $this->db->get_where('jsts_posttype', ['posttype_slug' => $id])->row_array();
		return $hsl;
	}


	public function get_posttipe($id) {
		$hsl = $this->db->get_where('jsts_post', ['post_type' => $id]);
		return $hsl;
	}

	// anyar
	public function get_posts_all() {
		$this->db->order_by('id_post', 'DESC');
		$this->db->select('*');
		$this->db->from('jsts_post');
		$this->db->join('jsts_posttype', 'jsts_posttype.id = jsts_post.post_type');
		$query = $this->db->get();
		return $query;
	}

	public function get_beritas() {
		$this->db->order_by('id_post', 'DESC');
		$this->db->select('*');
		$this->db->where('post_type', 1);
		$this->db->or_where('post_type', 20);
		$this->db->limit(4);
		$this->db->from('jsts_post');
		$this->db->join('jsts_posttype', 'jsts_posttype.id = jsts_post.post_type');
		$query = $this->db->get();
		return $query;
	}

	
	public function get_beritas_by_id($id) {
		$this->db->order_by('id_post', 'DESC');
		$this->db->select('*');
		$this->db->where('id_post', $id);
		$this->db->from('jsts_post');
		$this->db->join('jsts_posttype', 'jsts_posttype.id = jsts_post.post_type');
		$query = $this->db->get()->row_array();
		return $query;
	}


	public function get_podcasts() {
		$this->db->order_by('id_post', 'DESC');
		$this->db->select('*');
		$this->db->where('post_type', 21);
		$this->db->from('jsts_post');
		$this->db->join('jsts_posttype', 'jsts_posttype.id = jsts_post.post_type');
		$query = $this->db->get();
		return $query;
	}
	
	function get_post_list($limit, $start){
		$this->db->order_by('id_post', 'DESC');
		$this->db->select('*');
		$this->db->where('post_type', 1);
		$this->db->or_where('post_type', 20);
		$this->db->limit($limit, $start);
		$this->db->from('jsts_post');
		$this->db->join('jsts_posttype', 'jsts_posttype.id = jsts_post.post_type');
		$query = $this->db->get();
        // $query = $this->db->get_where('jsts_post', ['post_type' => 1], $limit, $start);
        return $query;
    }
	
	function get_podcast_list($limit, $start){
		$this->db->order_by('id_post', 'DESC');
		$this->db->select('*');
		$this->db->where('post_type', 21);
		$this->db->limit($limit, $start);
		$this->db->from('jsts_post');
		$this->db->join('jsts_posttype', 'jsts_posttype.id = jsts_post.post_type');
		$query = $this->db->get();
        return $query;
    }
	function get_postipe_post_list($id, $limit, $start){
		$this->db->order_by('id_post', 'DESC');
		$this->db->select('*');
		$this->db->where('post_type', $id);
		$this->db->limit($limit, $start);
		$this->db->from('jsts_post');
		$this->db->join('jsts_posttype', 'jsts_posttype.id = jsts_post.post_type');
		$query = $this->db->get();
        return $query;
    }

	function get_post_by_program_list($name, $limit, $start){
		$query = "SELECT * FROM `jsts_post` JOIN jsts_posttype ON jsts_posttype.id = jsts_post.post_type WHERE `programs` LIKE '%".$name."%' AND `post_type` != 22 ORDER BY `jsts_post`.`id_post` DESC LIMIT ".$start.", ".$limit."";
		$hsl = $this->db->query($query);
		return $hsl;
    }

	function get_post_list_search($name, $limit, $start){
		$query = "SELECT * FROM `jsts_post` JOIN jsts_posttype ON jsts_posttype.id = jsts_post.post_type WHERE `deskripsi` LIKE '%".$name."%' ORDER BY `jsts_post`.`id_post` DESC LIMIT ".$start.", ".$limit."";
		$hsl = $this->db->query($query);
		return $hsl;
    }
	
	public function search($id) {
		$query = "SELECT * FROM `jsts_post` JOIN jsts_posttype ON jsts_posttype.id = jsts_post.post_type WHERE `deskripsi` LIKE '%".$id."%' ORDER BY `jsts_post`.`id_post` DESC";
		$hsl = $this->db->query($query);
		return $hsl;
		// return $query;
	}
	public function get_post_search($id) {
		$this->db->order_by('id_post', 'DESC');
		$query = "SELECT * FROM `jsts_post` JOIN jsts_posttype ON jsts_posttype.id = jsts_post.post_type WHERE `deskripsi` LIKE '%".$id."%' ORDER BY `jsts_post`.`id_post` DESC";
		$hsl = $this->db->query($query);
		return $hsl;
		// return $query;
	}

	public function get_post_from_program($id) {
		$this->db->order_by('id_post', 'DESC');
		$query = "SELECT * FROM `jsts_post` JOIN jsts_posttype ON jsts_posttype.id = jsts_post.post_type WHERE `programs` LIKE '%".$id."%' ORDER BY `jsts_post`.`id_post` DESC";
		$hsl = $this->db->query($query);
		return $hsl;
		// return $query;
	}
	
	public function get_poster_programs($id) {
		$query = "SELECT * FROM `jsts_post` JOIN jsts_posttype ON jsts_posttype.id = jsts_post.post_type WHERE `programs` LIKE '%".$id."%' AND `post_type` = 22 ORDER BY `jsts_post`.`id_post` DESC";
		$hsl = $this->db->query($query);
		return $hsl;
		// return $query;
	}
	
    function get_berita_id($id){
    	$query = $this->db->get_where('jsts_post', ['slug' => $id])->row_array();
    	if ($query){
    	    echo "";
    	}else {
    	    $query = $this->db->get_where('jsts_post', ['id_post' => $id])->row_array();
    	}
        return $query;
    }

}