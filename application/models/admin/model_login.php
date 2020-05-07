<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {
   public function check_login($where)
   {
      return $this->db->get_where('sys_users',$where);
   }
   
   public function getUserProfile($user_id) {
      return  $this->db->get_where('sys_users',array('user_id' =>$user_id))->row();
			 
   
   }
   
  
}


