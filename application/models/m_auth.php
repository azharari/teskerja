<?php 
class m_auth extends CI_Model{
    
    function tampil_data_cassette_atm_bagus(){
        $this->db->where('nama_part', 'Cassette ATM');
        $this->db->where('kondisi', 'Bagus');
        $this->db->order_by('id_part', 'asc');
	return $this->db->get('view_stok');
    }
    
    function tampil_data_sparepart_atm_bagus(){
        $this->db->where('kategori', 'sparepart');
        $this->db->where('kondisi', 'Bagus');
        $this->db->order_by('id_part', 'asc');
	return $this->db->get('view_stok');
    }
    
    
    
    
    
    function tampil_data(){
        $this->db->where('tid', '');
	return $this->db->get('view_atm');
		
		//jika banyak like
		//$this->db->or_like('list.description', $searchTerm1);
		//$this->db->or_like('list.description', $searchTerm2);
		//$this->db->or_like('list.description', $searchTerm3)
    }
    
    function tampil_data_all(){
	return $this->db->get('view_atm');
		
		//jika banyak like
		//$this->db->or_like('list.description', $searchTerm1);
		//$this->db->or_like('list.description', $searchTerm2);
		//$this->db->or_like('list.description', $searchTerm3)
    }
    
    function cari_tid($tid)
    {
        //$this->db->select('nama_uker');
        //$this->db->from('view_atm');
        $this->db->where('tid', $tid);
        $hasil = $this->db->get('view_atm');
        return $hasil;
        
    }
    
    function cari_uker_pengelola_tid($tid)
    {
        $this->db->select('nama_uker');
        //$this->db->from('view_atm');
        $this->db->where('tid', $tid);
        $hasil = $this->db->get('view_atm');
        return $hasil;
    }
    
    function cari_tid2($tid)
    {
        $this->db->where('tid', $tid);
        $hasil = $this->db->get('view_atm2');
        return $hasil;
    }
    
    function cari_kc_supervisi_tid($tid)
    {
        
        $sql1   = "select data_atm.tid, data_atm.lokasi, data_atm.tid, data_atm.mesin, data_atm.site, data_atm.jam_ops, uker.nama_uker AS 'kc_supervisi'
        from (data_atm join uker on(data_atm.branch_code_kc = uker.branch_code)) 
        where data_atm.tid = '$tid'";
        $hasil = $this->db->query($sql1);
        return $hasil;
        
    }
    
    function cari_uker($uker)
    {
        $sql1   =   "select pekerja.nama_pekerja, pekerja.jabatan_pekerja, uker.nama_uker, pekerja.telp_pekerja 
                    from (uker join pekerja on(uker.branch_code = pekerja.branch_code_uker) ) 
                    where pekerja.branch_code_uker = '$uker'";
        $hasil = $this->db->query($sql1);
        return $hasil;
        
    }
    
    function cari_nama_uker($uker)
    {
        $this->db->where('branch_code', $uker);
        $hasil = $this->db->get('uker');
        return $hasil;
        return $hasil;
        
    }
  
}