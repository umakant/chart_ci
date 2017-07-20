<?php

class Selectusers extends CI_Model {
	
    public function __construct()
    {
        $this->load->database();
        error_reporting(0);
    }
	//insert into user table
    public function selectusers($ID)
    {	
		$query = $this->db->select('user_login,user_nicename')
				  ->where('ID', $ID)
				  ->get('ci_users');
  
		  $result = $query->result_array();
		  return $result;
    }
}