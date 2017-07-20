<?php

class Admin extends MY_Controller {
	

	public function __construct()
	{
		parent::__construct();
		if( ! $this->session->userdata('user_id') )
			return redirect('login');
			$this->load->model('articlesmodel','articles');
			$this->load->helper('form');
			$this->load->helper('url');  
			$this->load->model('selectusers');
	}

	public function dashboard()
	{
		$this->load->library('pagination');

		$config = [
			'base_url'			=>	base_url('admin/dashboard'),
			'per_page'			=>	5,
			'total_rows'		=>	$this->articles->num_rows(),
			'full_tag_open'		=>	"<ul class='pagination'>",
			'full_tag_close'	=>	"</ul>",
			'first_tag_open'	=>	'<li>',
			'first_tag_close'	=>	'</li>',
			'last_tag_open'		=>	'<li>',
			'last_tag_close'	=>	'</li>',
			'next_tag_open'		=>	'<li>',
			'next_tag_close'	=>	'</li>',
			'prev_tag_open'		=>	'<li>',
			'prev_tag_close'	=>	'</li>',
			'num_tag_open'		=>	'<li>',
			'num_tag_close'		=>	'</li>',
			'cur_tag_open'		=>	"<li class='active'><a>",
			'cur_tag_close'		=>	'</a></li>',
		];

		$this->pagination->initialize($config);

		$articles = $this->articles->articles_list( $config['per_page'], $this->uri->segment(3) );

		$this->load->view('admin/dashboard', ['articles'=>$articles]);
	}

	public function add_article()
	{
		$this->load->view('admin/add_article');
	}

	public function view_articles()
	{
		$this->load->library('pagination');

		$config = [
			'base_url'			=>	base_url('admin/view_articles'),
			'per_page'			=>	5,
			'total_rows'		=>	$this->articles->num_rows(),
			'full_tag_open'		=>	"<ul class='pagination'>",
			'full_tag_close'	=>	"</ul>",
			'first_tag_open'	=>	'<li>',
			'first_tag_close'	=>	'</li>',
			'last_tag_open'		=>	'<li>',
			'last_tag_close'	=>	'</li>',
			'next_tag_open'		=>	'<li>',
			'next_tag_close'	=>	'</li>',
			'prev_tag_open'		=>	'<li>',
			'prev_tag_close'	=>	'</li>',
			'num_tag_open'		=>	'<li>',
			'num_tag_close'		=>	'</li>',
			'cur_tag_open'		=>	"<li class='active'><a>",
			'cur_tag_close'		=>	'</a></li>',
		];

		$this->pagination->initialize($config);

		$articles = $this->articles->articles_list( $config['per_page'], $this->uri->segment(3) );

		$this->load->view('admin/view_articles', ['articles'=>$articles]);
	}
	public function store_article()
	{
		$config = [
			'upload_path'	=>		'./uploads',
			'allowed_types'	=>		'jpg|gif|png|jpeg',
		];
		$this->load->library('upload', $config);

		$this->load->library('form_validation');
		if( $this->form_validation->run('add_article_rules') && $this->upload->do_upload('image') ) {
			$post = $this->input->post();
			unset($post['submit']);
			$data = $this->upload->data();
			//echo "<pre>";
			// print_r($data); //exit;
			$image_path = base_url("uploads/" . $data['raw_name'] . $data['file_ext']);
			// echo $image_path; exit;
			$post['image_path'] = $image_path;
			return $this->_falshAndRedirect(
					$this->articles->add_article($post),
					"Article Added Successully.",
					"Article Failed To Add, Please Try Again."
					);
		} else {
			$upload_error = $this->upload->display_errors();
			$this->load->view('admin/add_article',compact('upload_error'));
		}
	}

	public function edit_article($article_id)
	{
		$article = $this->articles->find_article($article_id);
		$this->load->view('admin/edit_article',['article'=>$article]);
	}

	public function update_article($article_id)
	{
		$this->load->library('form_validation');
		if( $this->form_validation->run('add_article_rules') ) {
			$post = $this->input->post();
			unset($post['submit']);
			return $this->_falshAndRedirect(
						$this->articles->update_article($article_id,$post),
						"Article Updated Successully.",
						"Article Failed To Update, Please Try Again."
					);
		} else {
			$this->load->view('admin/edit_article');
		}
	}

	public function delete_article()
	{
		$article_id = $this->input->post('article_id');

		return $this->_falshAndRedirect(
					$this->articles->delete_article($article_id),
					"Article Deleted Successully.",
					"Article Failed To Delete, Please Try Again."
				);
	}

	private function _falshAndRedirect( $successful, $successMessage, $failureMessage )
	{
		if( $successful ) {
			$this->session->set_flashdata('feedback',$successMessage);
			$this->session->set_flashdata('feedback_class', 'alert-success');
		} else {
			$this->session->set_flashdata('feedback', $failureMessage);
			$this->session->set_flashdata('feedback_class', 'alert-danger');
		}
		return redirect('admin/dashboard');
	}
	
	
	public function profile()
	{
		$this->load->view('admin/user_profile');
	}
	
	public function edit_profile()
	{
		$this->load->view('admin/edit_profile');
	}
	
	public function update_profile()
	{
		$this->load->view('admin/update_profile');
	}
	
	public function update_profile_complete()
	{
		$user_id = $this->uri->segment(3);
		
		$this->load->library('form_validation');
		
		$config = [
			'upload_path'	=>		'./uploads/',
			'allowed_types'	=>		'jpg|gif|png|jpeg',
		];
		$this->load->library('upload', $config);
		
		if( $this->form_validation->run('profile') && $this->upload->do_upload('profile_pic') ) {
		
		$data = $this->upload->data();
		// echo "<pre>";
		// print_r($data); exit;
		$image_path = base_url("uploads/" . $data['raw_name'] . $data['file_ext']);
		// echo $image_path; 
		 //exit;
		$post['image_path'] = $image_path;
		
		$data = array(
			'email' 		=>  $this->input->post('email'),
			'uname' 		=>  $this->input->post('uname'),
			'fname'			=>  $this->input->post('fname'),
			'lname' 		=>  $this->input->post('lname'),
			'profile_pic' 	=>  $image_path
		);
		$this->load->model('updateprofilemodel');
		$this->updateprofilemodel->updateprofile($user_id, $data);
		
		
		redirect('admin/profile');
		} else {
			$upload_errors = $this->upload->display_errors();
			$this->load->view('admin/edit_profile',$upload_errors);
		}
	}
	
	public function add_user(){
		
		$this->load->helper('form');
		
		$this->load->view('admin/add_users.php');
		
	}
	public function user_insert()
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
				//echo $to_email;
				//$this->email->cc('another@another-example.com');
				//$this->email->bcc('them@their-example.com');

				$this->email->subject('Email Test');
				$this->email->message('Testing the email class.');
				//echo $email_msg = $this->email->message('Testing the email class.');
				//exit();
				
				$this->email->send();
				
				$this->load->model('registrationmodel');

				$this->registrationmodel->insertUser($data);
				
				redirect('admin/view_users');
			// }
 
	}	
	public function getOrdersMonth() {
		//print_r($_POST);
		$var = date('Y-m-d',strtotime('01-'.$_POST['mnth'].'-2016'));
		$var;
		$date = date('Y-m-d', strtotime('+1 month', strtotime($var)));
		//$sql = "SELECT post_id,meta_value FROM order_posts INNER JOIN ci_postmeta ON order_posts.id = ci_postmeta.post_id WHERE order_posts.ID = 6289 AND meta_value='_order_total'";
		
		
		$sql= "SELECT post_title,ID,post_status FROM `order_posts` WHERE  post_date BETWEEN '$var' AND '$date' AND post_type='shop_order'  AND post_status='wc-completed'";
		//echo $sql;
		$query	= $this->db->query($sql);
		$res = $query->result_array(); 
		
		//print_r($res);
		if (empty($res)){
			echo 'No orders in this month.';
		}
		else {
			echo 'Total Orders in '.$_POST['mnth'].' Month';
			
			echo '<div class="row">
					<div class="col-md-2"><b>Order No.</b></div>
					<div class="col-md-2"><b>Date</b></div>
					<div class="col-md-3"><b>Customer Name</b></div>
					<div class="col-md-3"><b>Customer Country</b></div>
					<div class="col-md-2"><b>Value</b></div>
				</div>
				';
			$i=1;

			foreach($res  as $key=>$val){
				$pieces = explode(" ",$val["post_title"]);
				$date_order = $pieces[2].$pieces[3].$pieces[4];
				$order_id = $val["ID"];
				$my_sql = "SELECT meta_value,post_id FROM `ci_postmeta` WHERE `meta_key` LIKE '_order_total' AND post_id = '$order_id'";
				//echo $my_sql;
				$query	= $this->db->query($my_sql);
				$resss = $query->result_array(); 
				
				
				$price_sql = "SELECT meta_value,post_id FROM `ci_postmeta` WHERE `meta_key` LIKE '_billing_country' AND post_id = '$order_id'";
				//echo $price_sql;
				$query	= $this->db->query($price_sql);
				$res_order = $query->result_array(); 
				
				// echo'<pre>';
				// print_r($res_order);
				// echo'</pre>';
				
				$author_sql = "SELECT ID,post_author,post_title,post_status FROM `order_posts` WHERE `post_status` = 'wc-completed' AND ID = '$order_id'";
				//SELECT meta_value,post_id FROM `ci_postmeta` WHERE `meta_key` LIKE '_billing_country' AND post_id = '$order_id'";
				//echo $author_sql;
				$query	= $this->db->query($author_sql);
				$author_order = $query->result_array(); 
				
				// echo'<pre>';
				// print_r($author_order);
				// echo'</pre>';
				$author_id = $author_order[0]["post_author"];
				$author_name_sql = "SELECT user_login FROM ci_users WHERE ID='$author_id'";
				//echo $author_name_sql;
				$querys	= $this->db->query($author_name_sql);
				$author_name = $querys->result_array(); 
				
				// echo'<pre>';
				// print_r($author_name);
				// echo'</pre>';
				?>
				<div class="row class_data">
					<div class="col-md-2"><?php echo $order_id; ?></div>
					<div class="col-md-2"><?php echo $date_order; ?></div>
					<div class="col-md-3">
						<?php if (empty($author_name[0]["user_login"])){
								echo 'No Value';
						}else {
							echo $author_name[0]["user_login"];
						} ?>
					</div>
					<div class="col-md-3">
						<?php if (empty($res_order[0]["meta_value"])){
								echo 'No Value';
						}else {
							echo $res_order[0]["meta_value"];
						} ?>
					</div>
					<div class="col-md-2">
						<?php if (empty($resss[0]["meta_value"])){
								echo 'No Value';
						}else {
							echo '$'.$resss[0]["meta_value"];
						} ?>
					</div>
				</div>
				<?php
			  $i++;
			} 
			echo '</div>';
		}
	}
	public function getOrdersStatus() {
		$tt = $_POST['status'];
		
		$sqls= "SELECT post_title,ID FROM `order_posts` WHERE post_date AND post_type='shop_order' AND post_status='wc-".$tt."' LIMIT 500 ";
		
		//echo $sql;
		$query	= $this->db->query($sqls);
		$res = $query->result_array(); 
		$order_count = count($res);
		//print_r($res);
		if (empty($res)){
			echo 'No orders in this month.';
		}
		else {

			echo 'Total '.$_POST['status'].' Orders is '.$order_count;
			
			echo '<div class="row">
					<div class="col-md-2"><b>Order No.</b></div>
					<div class="col-md-2"><b>Date</b></div>
					<div class="col-md-2"><b>Customer Name</b></div>
					<div class="col-md-2"><b>Customer Country</b></div>
					<div class="col-md-2"><b>Value</b></div>
					<div class="col-md-2"><b>Status</b></div>
				</div>
				';
			$i=1;

			foreach($res  as $key=>$val){
				$pieces = explode(" ",$val["post_title"]);
				$date_order = $pieces[2].$pieces[3].$pieces[4];
				$order_id = $val["ID"];
				$my_sql = "SELECT meta_value,post_id FROM `ci_postmeta` WHERE `meta_key` LIKE '_order_total' AND post_id = '$order_id'";
				//echo $my_sql;
				$query	= $this->db->query($my_sql);
				$resss = $query->result_array(); 
				
				
				$price_sql = "SELECT meta_value,post_id FROM `ci_postmeta` WHERE `meta_key` LIKE '_billing_country' AND post_id = '$order_id'";
				//echo $price_sql;
				$query	= $this->db->query($price_sql);
				$res_order = $query->result_array(); 
				
				// echo'<pre>';
				// print_r($res_order);
				// echo'</pre>';
				
				$author_sql = "SELECT ID,post_author,post_title,post_status FROM `order_posts` WHERE `post_status` = 'wc-$tt' AND ID = '$order_id'";
				//SELECT meta_value,post_id FROM `ci_postmeta` WHERE `meta_key` LIKE '_billing_country' AND post_id = '$order_id'";
				//echo $author_sql;
				$query	= $this->db->query($author_sql);
				$author_order = $query->result_array(); 
				
				 // echo'<pre>';
				 // print_r($author_order);
				 // echo'</pre>';
				$author_id = $author_order[0]["post_author"];
				$author_name_sql = "SELECT user_login FROM ci_users WHERE ID='$author_id'";
				//echo $author_name_sql;
				$querys	= $this->db->query($author_name_sql);
				$author_name = $querys->result_array(); 
				
				// echo'<pre>';
				// print_r($author_name);
				// echo'</pre>';
				?>
				<div class="row class_data">
					<div class="col-md-2"><?php echo $order_id; ?></div>
					<div class="col-md-2"><?php echo $date_order; ?></div>
					<div class="col-md-2">
						<?php if (empty($author_name[0]["user_login"])){
								echo 'No Value';
						}else {
							echo $author_name[0]["user_login"];
						} ?>
					</div>
					<div class="col-md-2">
						<?php if (empty($res_order[0]["meta_value"])){
								echo 'No Value';
						}else {
							echo $res_order[0]["meta_value"];
						} ?>
					</div>
					<div class="col-md-2">
						<?php if (empty($resss[0]["meta_value"])){
								echo 'No Value';
						}else {
							echo '$'.$resss[0]["meta_value"];
						} ?>
					</div>
					<div class="col-md-2">
						<?php if (empty($tt)){
								echo 'No Value';
						}else {
							echo $tt;
						} ?>
					</div>
				</div>
				<?php
			  $i++;
			} 
			echo '</div>';
		}
	}
	public function getUsersCountry() {
		//print_r($_POST);
		//echo $_POST['status']; 
		$count_try = $_POST['country'];
		$user_meta = $this->db->select('meta_value, user_id')
							  ->where('meta_key','billing_country')
							  ->where('meta_value',$_POST['country'])
							  ->get('ci_usermeta');
		//$sql = "Select meta_value from ci_usermeta where meta_key='billing_country'";
		
		//SELECT 'meta_value' FROM 'ci_usermeta' WHERE 'meta_key' = 'billing_country'
		$user_data = $user_meta->result_array(); 
		$sqlldg = $this->db->last_query();
		// $query	= $this->db->query($sql);
		// $ress = $query->result_array(); 
		//print_r($user_data);
		
		// $ress = $query->result_array(); 
		//print_r($res);
		
		$sql_c = "SELECT * FROM `ci_postmeta` WHERE `meta_key` LIKE '_billing_country' AND `meta_value` LIKE '$count_try'";
		//echo $sql_c;
		$query	= $this->db->query($sql_c);
		$res_c = $query->result_array(); 
		
			
			echo '<div class="row">
					<div class="col-md-2"><b>Order No.</b></div>
					<div class="col-md-2"><b>Date</b></div>
					<div class="col-md-3"><b>Customer Name</b></div>
					<div class="col-md-3"><b>Customer Country</b></div>
					<div class="col-md-2"><b>Value</b></div>
				</div>
				';
		for($ii=0;$ii<count($res_c);$ii++){
		//echo $res_c[$ii]['post_id'];
		$sqls= "SELECT post_title,ID FROM `order_posts` WHERE ID='".$res_c[$ii]['post_id']."' AND post_type='shop_order'";
		//echo $sqls;
		$query	= $this->db->query($sqls);
		$res = $query->result_array(); 
		$order_count = count($res);
		//print_r($res);

			$i=1;

			foreach($res  as $key=>$val){
				$pieces = explode(" ",$val["post_title"]);
				$date_order = $pieces[2].$pieces[3].$pieces[4];
				$order_id = $val["ID"];
				$my_sql = "SELECT meta_value,post_id FROM `ci_postmeta` WHERE `meta_key` LIKE '_order_total' AND post_id = '$order_id'";
				//echo $my_sql;
				$query	= $this->db->query($my_sql);
				$resss = $query->result_array(); 
				
				
				$price_sql = "SELECT meta_value,post_id FROM `ci_postmeta` WHERE `meta_key` LIKE '_billing_country' AND post_id = '$order_id'";
				//echo $price_sql;
				$query	= $this->db->query($price_sql);
				$res_order = $query->result_array(); 
				
				// echo'<pre>';
				// print_r($res_order);
				// echo'</pre>';
				
				$author_sql = "SELECT ID,post_author,post_title,post_status FROM `order_posts` WHERE `post_status` = 'wc-completed' AND ID = '$order_id'";
				//SELECT meta_value,post_id FROM `ci_postmeta` WHERE `meta_key` LIKE '_billing_country' AND post_id = '$order_id'";
				//echo $author_sql;
				$query	= $this->db->query($author_sql);
				$author_order = $query->result_array(); 
				
				 // echo'<pre>';
				 // print_r($author_order);
				 // echo'</pre>';
				$author_id = $author_order[0]["post_author"];
				$author_name_sql = "SELECT user_login FROM ci_users WHERE ID='$author_id'";
				//echo $author_name_sql;
				$querys	= $this->db->query($author_name_sql);
				$author_name = $querys->result_array(); 
				
				// echo'<pre>';
				// print_r($author_name);
				// echo'</pre>';
				?>
				<div class="row class_data">
					<div class="col-md-2"><?php echo $order_id; ?></div>
					<div class="col-md-2"><?php echo $date_order; ?></div>
					<div class="col-md-3">
						<?php if (empty($author_name[0]["user_login"])){
								echo 'No Value';
						}else {
							echo $author_name[0]["user_login"];
						} ?>
					</div>
					<div class="col-md-3">
						<?php if (empty($_POST['country'])){
								echo 'No Value';
						}else {
							echo $_POST['country'];
						} ?>
					</div>
					<div class="col-md-2">
						<?php if (empty($resss[0]["meta_value"])){
								echo 'No Value';
						}else {
							echo '$'.$resss[0]["meta_value"];
						} ?>
					</div>
				</div>
				<?php
			  $i++;
			} 
			echo '</div>';
		//}
		}
		
	}
	public function view_users() 
	{
		//echo 'View users';
		$this->load->view('admin/view_users.php');
		//$this->load->helper('form');
		//$this->load->view('public/registration_successful');
	}
	
	

	
}