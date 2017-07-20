<?php

class Usermodel extends CI_Model {
	
	public function users_list()
	{
		
		$user_id = $this->session->userdata('user_id');
		$query = $this->db->select(['email','id','uname'])
							->from('users')
							->get();
		//echo $result = $this->db->query(); exit;
							
		return $result = $query->result();
	}

}