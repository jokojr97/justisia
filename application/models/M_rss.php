<?php
class M_rss extends CI_Model{
	function get_posts($count){        
		$this->db->order_by('id_post', 'DESC');
		$query = $this->db->get('jsts_post', $count)->result();
		return $query;
	}
}