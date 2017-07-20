<?php
class EmployeeModel extends CI_Model
{
	public function employee_insert($data)
	{
  		$this->db->insert('employees', $data);
	}
 
}

?>