<?php
class M_users extends CI_Model{
	function get_users(){
		$hsl = $this->db->get('jsts_user');
		return $hsl;
	}
}