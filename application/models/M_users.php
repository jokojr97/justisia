<?php
class M_users extends CI_Model{
	function get_users(){
		$hsl = $this->db->get('jsts_user');
		return $hsl;
	}
	function get_users_by_id($id){
		$hsl = $this->db->get_where('jsts_user', ['id' => $id])->row_array();
		return $hsl;
	}
}