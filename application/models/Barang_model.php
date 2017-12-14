<?php

class Barang_model extends CI_Model{
    
    //nama tabel
    public $tabel = 'barang';

    //tampilkan semua data tabel barang
    function tampil_data_semua(){
        $query = $this->db->get($this->tabel);
        return $query;
    }

    function tampil_data_beberapa($parameter=null){
        if($parameter){
			$this->db->order('harga_barang',$parameter);
		}else{
            $this->db->order('update_at','desc');
        }
        $query = $this->db->get($this->tabel);
        return $query;
    }

}