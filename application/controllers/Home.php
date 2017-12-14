<?php


class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model(array('barang_model'));
    }


    //halaman default home
    function index(){
        // Barang
        
        //total barang
        $total_data_barang = $this->barang_model->tampil_data_semua(($this->input->get('search')?$this->input->get('search'):null))->num_rows();
        
        // definisikan page
        $page = ($this->input->get('page')>0?$this->input->get('page'):1);
        // tampilkan 
		$limit = 9;
		$offset = $limit*($page-1);

		$link = ceil($total_data_barang/$limit);

        // data barang
		$data_barang = $this->barang_model->get($limit,$offset,($this->input->get('search')?$this->input->get('search'):null))->result();
		
		if ($this->input->get('search')==null){
			$url = '?page='; 
		}
        else{
            $url = '?search='.str_replace(' ','+',$this->input->get('search')).'&page=';
        }
		
		$hal = $this->input->get('page');

        // penomoran
        if ($hal==null){
            $no = 1 + (1-1) * ($limit-1);
        }else{
            $no = $hal + ($hal-1) * ($limit-1);
        }

        // print_r($hasil);

        // $alert= $this->session->flashdata('alert');

        $this->template->load('dashboard', 'admin/user/view', array('hasil'=>$hasil, 'link'=>$link, 'url'=>$url, 'hal'=>$hal, 'total_data'=>$num, 'no'=>$no, 'alert'=>$alert));
    
    }



}