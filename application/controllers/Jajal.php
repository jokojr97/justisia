<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Jajal extends CI_Controller {
    public function index(){
        $user_ip=$_SERVER['REMOTE_ADDR'];   
        $page="home";
        $session= $this->session->userdata();
        $s_id= $session['__ci_last_regenerate'];
        $jumlah = $this->total_online($s_id);
        // var_dump($jumlah);
        echo $jumlah;
        // echo $s_id;
        // var_dump($session);
        // echo $user_ip;
        // $check_ip = $this->db->query("SELECT userip FROM jsts_pageview WHERE page='".$page."' AND userip='".$user_ip."'")->row_array();
        // var_dump($check_ip);
        $this->load->view('jajal');
    }
    private function total_online($session_id){
        // $session= $this->session->userdata();
        $s_id= $session_id;
        $current_time = time();
        $timeout = $current_time - (60);
        $session_exist = $this->db->query("SELECT session FROM jsts_total_visitor WHERE session='".$session_id."'");
        $count = $this->db->count_all_results();

        $session_check = $count;

        if ($session_check == 0 && $s_id != "") {
            
            $data = [
                'id' => NULL,
                'session' => $s_id,
                'date_created' => time()

            ];

            $this->db->insert('jsts_total_visitor', $data);
        }else {        
            $ses = $session_exist->row_array(); 
            $ses_id = $ses['id']; 
            $data = [
                'id' => $ses_id,
                'session' => $s_id,
                'date_created' => time()

            ];
            
            $this->db->where('session', $s_id);
            $this->db->update('jsts_total_visitor', $data);
        }
        $counts = $this->db->count_all_results();
        $select_total = $this->db->query("SELECT * FROM jsts_total_visitor WHERE date_created >= '".$timeout."'");
        return $counts;
    }
}