<?php

class Registrationmodel extends CI_Model {
    
	//insert into user table
    public function insertUser($data)
    {	
		//print_r($data);
        $this->db->insert('users', $data);
    }
	//insert into user table
    public function updateprofile($user_id, $data)
    {	
		//print_r($data);
        $this->db->where('id',$user_id)
				 ->update('users', $data);
    }
    

}