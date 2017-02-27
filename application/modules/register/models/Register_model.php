<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Register_Model extends CI_Model {
 
	
	public function save($data)
	{
	
			$this->db->insert('user', $data);
			return $this->db->insert_id();
			
		
        
    }
	
 
}