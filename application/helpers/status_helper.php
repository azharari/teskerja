<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('status'))
{
    function warna_stok($stok, $nama_stok)
    {
        if($stok == 1)
        {
            return "<div class='col-md-2'><div class='callout callout-success'><h4> $stok Pcs</h4><p> $nama_stok</p></div></div>";
        }   
        
        else
        {
            $hasil = 'KONDISI BAGUS';
            return $hasil;
        }
    }
    
    function status2()
    {
        
    }
}