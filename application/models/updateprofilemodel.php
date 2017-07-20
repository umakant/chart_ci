<?php

class Updateprofilemodel extends CI_Model {
    
	//insert into user table
    public function updateprofile($user_id, $data)
    {	
		//print_r($data);
        $this->db->where('id',$user_id)
				 ->update('users', $data);
    }
    

}