<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class auth_model extends CI_Model {
    
//    untuk mengcek jumlah username dan password yang sesuai
    function login($username,$password) {
        $this->db->where('Username', $username);
        $this->db->where('Password', $password);
        $query =  $this->db->get('User');
        return $query->num_rows();
    }
    
//    untuk mengambil data hasil login
    function data_login($username,$password) {
		$this->db->select('*');
        $this->db->where('Username', $username);
        $this->db->where('Password', $password);
        return $this->db->get('User')->row();
    }
}
 