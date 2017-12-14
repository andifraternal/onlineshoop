<?php

class Barang extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model('barang_model');
    }

    function index(){
        
    }
}