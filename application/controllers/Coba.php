<?php

class Coba extends CI_Controller{
    function __construct(){
        parent::__construct();
    }

    function ip_address(){
        $ipAddress=$_SERVER['REMOTE_ADDR'];
       echo $ipAddress;    
    }

    function mac_address(){
        
        $_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];
        $_PERINTAH = "arp -a $_IP_ADDRESS";
        ob_start();
        system($_PERINTAH);
        $_HASIL = ob_get_contents();
        ob_clean();
        // $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
        
        $_sHASIL = substr($_HASIL,105, 23);
        echo $_sHASIL;
    }

    function user(){
        if ($this->agent->is_browser()){
			$agent = $this->agent->browser().' '.$this->agent->version();
		}elseif ($this->agent->is_mobile()){
			$agent = $this->agent->mobile();
		}else{
			$agent = 'Data user gagal di dapatkan';
		}
 
		echo "Di akses dari :<br/>";
		echo "Browser = ". $agent . "<br/>";
		echo "Sistem Operasi = " . $this->agent->platform() ."<br/>"; // Platform info (Windows, Linux, Mac, etc.)
		//ip hanya muncul pada hosting
		echo "IP = " . $this->input->ip_address();
    }
}
