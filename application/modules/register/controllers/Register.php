<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
    {
        parent::__construct();
       
        $this->load->model('Register_Model', 'customers'); 
		//$this->load->library('session');
		$this->load->helper('Admin');
    }
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('Register_View');
	}
	
	
	public function ajax_add()
    {
        $data = array(
				'Nama'		=> $this->input->post('Nama'),
                'Username' 	=> $this->input->post('Username'),
                'Password' 	=> $this->input->post('Password'),
				'Jabatan'	=> 'Admin',
				'Level' 	=> '1'
            );
        $insert = $this->customers->save($data);
        echo json_encode(array("status" => TRUE));
    }
	
}
