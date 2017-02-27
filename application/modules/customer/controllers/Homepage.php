<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        
        $this->load->model('Homepage_model', 'Homepage'); 
		//$this->load->library('session');
		//$this->load->helper('Admin');
    }
	public function index()
	{
		$data['mobil'] = $this->Homepage->get_mobil();
		$this->load->helper('url');
		$this->load->view('Homepage_view', $data);
	}
	
	function get_mobil()
	{	$hasil = $this->Homepage->get_mobil();
		echo $hasil->Nama_Mobil;
	}
	
}