<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dokumen_Model extends CI_Model {
 
    var $table 			= 'dokumen_view';
    var $column_order 	= array(null, 'Id','Jenis_Dokumen', 'Id_Mobil'); //set column field database for datatable orderable
    var $column_search 	= array('Id','Jenis_Dokumen', 'Id_Mobil'); //set column field database for datatable searchable 
    var $order 			= array('Id_Mobil' => 'asc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	
	public function save($data)
	{
		$config['upload_path'] = 'assets/gambar/';
		$config['max_size']	= '5000';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        //$this->upload->set_allowed_types('*');
		if (!$this->upload->do_upload('file')) {
            $data['File'] = null;
        }else
		{
			$this->upload->do_upload('File');
            $file = $this->upload->data();
            $data['File'] = $config['upload_path'].$file['file_name'];
			$this->db->insert('dokumen', $data);
			return $this->db->insert_id();
		}
    }
	
	public function get_by_id($Id_Mobil)
    {
        $this->db->from($this->table);
        $this->db->where('Id_Mobil',$Id_Mobil);
        $query = $this->db->get();
 
        return $query->row();
    }

	public function delete_by_id($Id)
	{
		$this->db->where('Id',$Id);
		$query = $this->db->get('dokumen');
		$row = $query->row();
		unlink("$row->File");
		$this->db->where('Id', $Id);
		$this->db->delete('Dokumen');
	}
	
	function Get_Id_Mobil()
	{
		return $this->db->get('master_mobil')->result();
	}
 
}