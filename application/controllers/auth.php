<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class auth extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();		
        $this->load->model('m_auth');
        $this->load->helper('url'); 
        //$this->load->helper('cassette');
    }
    
    public function index($error = NULL) {
        $data = array(
            'title' => 'Login Page',
            'action' => site_url('auth/login'),
            'error' => $error
        );
        
      
        $this->load->view('login', $data);
    }
 
    public function login() {
        $this->load->model('auth_model');
        $password   = $this->input->post('password');
        $login = $this->auth_model->login($this->input->post('username'),$password);
 
        if ($login == 1) {
//          ambil detail data
            $row = $this->auth_model->data_login($this->input->post('username'), $this->input->post('password'));
 
//          daftarkan session
            $data = array(
                'Logged' => TRUE,
				'coba' => 'coba',
                'Username' => $row->Username,
				'Level'	=> $row->Level
            );
            $this->session->set_userdata($data);
 

            redirect(site_url('admin/Admin'));
        } else {

            $error = "Password atau username salah";
			//echo 'window.alert('Esempio di messaggio di avviso al caricamento della pagina.')';
            redirect(site_url('auth'));
        }
    }
 
    function logout() {

        $this->session->sess_destroy();
        redirect(site_url('auth'));
    }
    
    
 
}
 