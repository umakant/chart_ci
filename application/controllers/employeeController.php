<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeController extends CI_Controller {

	 
	public function index()
	{
		$this->load->view('public/employees_view');
	}
	public function InsertEmployee()
	{
         //getting post values 
		$_POST = json_decode(file_get_contents('php://input'), true);
		 
		 $data = array(
				'ename'=>  $_POST['employee_name'],
				'email'=> $_POST['email'],
				'phone'=>  $_POST['phone'],
				'address'=>  $_POST['address']
				);
		//print_r($data);
		
	 	$this->load->model('EmployeeModel');
	     $this->EmployeeModel->employee_insert($data);
		 
		// echo "Inserted";
	 
	}
 
}