<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('Logged')==TRUE){
           redirect(site_url('auth'));
        }
        $this->load->model('Dokumen_model'); 
		//$this->load->library('session');
		$this->load->helper('Admin');
    }
	public function index()
	{
		$this->load->helper('url');
		
		$data['Id_Mobil'] = $this->Dokumen_model->Get_Id_Mobil();
		$this->load->view('Dokumen_View', $data);
	}
	
	public function ajax_list()
    {
        $list = $this->Dokumen_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->Id;
            $row[] = $customers->Jenis_Dokumen;
            $row[] = $customers->Id_Mobil;
			$row[] = '<img src='."'".site_url('').$customers->File."'".'>';
			$row[] = $customers->Keterangan;
			//add html for action
			$row[] = '<CENTER>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_mobil('."'".$customers->Id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
		
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Dokumen_model->count_all(),
                        "recordsFiltered" => $this->Dokumen_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	public function tambah()
    {
        $data = array(
				'Id'	=> '',
                'Jenis_Dokumen' => $this->input->post('jenis_dokumen'),
                'Id_Mobil' => $this->input->post('id_mobil'),
				'File' => $this->input->post('file'),
                'Keterangan' => $this->input->post('keterangan'),
            );
        $this->Dokumen_model->save($data);
        redirect('dokumen/dokumen/index');
    }
	
	public function delete($id)
	{
		$this->Dokumen_model->delete_by_id($id);
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
		echo json_encode($this->Dokumen_model->Get_Id_Mobil());
	}
}
