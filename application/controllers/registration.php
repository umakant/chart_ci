<?php

Class Registration extends MY_Controller {
	public function index()
	{
		if( $this->session->userdata('user_id') )
			return redirect('admin/dashboard');
		
		$this->load->helper('form');
		$this->load->view('public/user_registration');
	}
	
	public function user_register()
	{		
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		
		// $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		// $this->form_validation->set_rules(
        // 'uname', 'Username',
        // 'required|min_length[5]|max_length[12]|is_unique[users.uname]',
        // array(
                // 'required'      => 'You have not provided %s.',
                // 'is_unique'     => 'This %s already exists.'
				// )
		// );
		// $this->form_validation->set_rules('pword', 'Password', 'required');
		// $this->form_validation->set_rules('cpword', 'Password Confirmation', 'required|matches[pword]');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		
		// if ($this->form_validation->run('signup') == FALSE)
			// {
				// $this->load->helper('form');
				// $this->load->view('public/user_registration');
			// }
		// else
			// {
				//print_r($_POST);
				$data = array(
					'id' 	=>  $this->input->post('id'),
					'email' =>  $this->input->post('email'),
					'uname' =>  $this->input->post('uname'),
					'pword' =>  $this->input->post('pword'),
					'cpword' =>  $this->input->post('cpword'),
					'fname' =>  $this->input->post('fname'),
					'lname' =>  $this->input->post('lname')
				);
				$this->load->library('email');
				$email = $this->input->post('email');
				
				$this->email->from('umakantsonwani@gmail.com', 'Umakant');
				$to_email = $this->email->to($email);
				echo $to_email;
				//$this->email->cc('another@another-example.com');
				//$this->email->bcc('them@their-example.com');

				$this->email->subject('Email Test');
				$this->email->message('Testing the email class.');
				echo $email_msg = $this->email->message('Testing the email class.');
				//exit();
				
				$this->email->send();
				
				$this->load->model('registrationmodel');

				$this->registrationmodel->insertUser($data);
				
				redirect('registration/register_success');
			// }
 
	}	
	public function register_success() 
	{
		$this->load->helper('form');
		$this->load->view('public/registration_successful');
	}
	
	// public function display_doforget()
	 // {
		// $data="";
		// $this->load->view('user/forgetpassword',$data);
	 // }
	 // public function doforget()
	 // {
		 // $this->load->helper('url');
		 // $email= $this->input->post('email');
		 // $this->load->library('form_validation');
		 // $this->form_validation->set_rules('email','email','required|xss_clean|trim');
	 // if ($this->form_validation->run() == FALSE)
	 // {
	 
		// $this->load->view('public/forgetpassword');
	 
	 // }
	 // else
	 // {
		// $q = $this->db->query("select * from users where email='" . $email . "'");
			// // if ($q->num_rows >0 ) {
				// // $r = $q->result();
				// // $user=$r[];
		 // // $this->load->helper('string');
		 // // $password= random_string('alnum',6);
		 // // $this->db->where('user_id', $user->user_id);
		 // // $this->db->update('users',array('pword'=>$password,'pass_encryption'=>MD5($password)));
		 // // $this->load->library('email');
		 // // $this->email->from('contact@example.com', 'sampletest');
		 // // $this->email->to($user->emailid); 
		 // // $this->email->subject('Password reset');
		 // // $this->email->message('You have requested the new password, Here is you new password:'. $password); 
		 // // $this->email->send();
		 // // $this->session->set_flashdata('message','Password has been reset and has been sent to email'); 
		// // redirect('user/display_doforget');
		// // }
		// // }
	 // }
 }







