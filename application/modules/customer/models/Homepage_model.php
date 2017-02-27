<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Homepage_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	function get_mobil()
	{
		$this->db->select('*');
		$this->db->where('Status','Available');
		return $this->db->get('master_mobil')->result();
	}
	
}