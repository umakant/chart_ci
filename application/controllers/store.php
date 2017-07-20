<?php

class Store extends MY_Controller {
	

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
	
	
	public function add_product()
	{
		$this->load->view('admin/store/add_product');
	}
	
	public function store_product()
	{
		$config = [
			'upload_path'	=>		'./uploads',
			'allowed_types'	=>		'jpg|gif|png|jpeg',
		];
		$this->load->library('upload', $config);

		$this->load->library('form_validation');
		if( $this->form_validation->run('add_product_rules') && $this->upload->do_upload('image') ) {
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

	
	
}