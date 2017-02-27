<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('Admin'))
{
    function Get_Id_Mobil()
    {
        $this->db->select_max('Id_Mobil');
		$q 	= $this->db->get('master_mobil')->row();
		return $q->Id_Mobil;
    }
    
}