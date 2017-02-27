<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('Logged')==TRUE){
           redirect(site_url('auth'));
        }
        $this->load->model('Admin_Model', 'customers'); 
		//$this->load->library('session');
		$this->load->helper('Admin');
    }
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('Admin_View');
	}
	
	public function ajax_list()
    {
        $list = $this->customers->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->Id_Mobil;
            $row[] = $customers->Nama_Mobil;
            $row[] = $customers->No_Polisi;
			$row[] = $customers->Status;
			//add html for action
			$row[] = '<center><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$customers->Id_Mobil."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_mobil('."'".$customers->Id_Mobil."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
		
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->customers->count_all(),
                        "recordsFiltered" => $this->customers->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	public function ajax_add()
    {
        $data = array(
				'Id_Mobil'	=> $this->Get_Id_Mobil(),
                'Nama_Mobil' => $this->input->post('Nama_Mobil'),
                'No_Polisi' => $this->input->post('No_Polisi'),
				'Harga'		=> $this->input->post('Harga'),
				'Creator'	=> $this->session->userdata('Username'),
                'Status' => 'Available'
            );
        $insert = $this->customers->save($data);
        echo json_encode(array("status" => TRUE));
    }
	
	public function update()
	{
		$data = array(
				'Id_Mobil'	=> $this->input->post('Id_Mobil'),
                'Nama_Mobil' => $this->input->post('Nama_Mobil'),
                'No_Polisi' => $this->input->post('No_Polisi'),
                'Status' => $this->input->post('Status'),
            );
		$this->customers->update(array('Id_Mobil' => $this->input->post('Id_Mobil')), $data);
		echo json_encode(array("status" => TRUE));
	}
	
	public function edit($Id_Mobil)
    {
        $data = $this->customers->get_by_id($Id_Mobil);
        echo json_encode($data);
    }
	
	public function delete($id)
	{
		$this->customers->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	public function upload_dokumen($data)
	{
		  $config['upload_path']          = './assets/gambar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('Gambar_Mobil'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
	}
	
	public function Get_Id_Mobil()
	{
		return $this->customers->Get_Id_Mobil();
	}
	
	function excel()
	{
		$data['hasil'] = $this->db->get('excel_view')->result();
		$this->load->view('excel', $data);
	}
}
