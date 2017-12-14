<?php

function sesscheck(){
  $CI =& get_instance();
  $is_logged_in = $CI->session->userdata('logged_in');
     if($is_logged_in)
     {
       $output = new stdClass;
       $output->user_id = $CI->session->userdata('id');
       return $output;
     }else{
        redirect('auth/login');
     }
}
