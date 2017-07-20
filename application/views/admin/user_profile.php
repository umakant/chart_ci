<?php include_once('admin_header.php'); ?>

<div class="container right-side">
		<?php 
			$user_id = $this->session->userdata('user_id');
			$q = $this->db->select('*')
					      ->where('id', $user_id)
						  ->get('users');
			$data = $q->result_array(); 
			//print_r($data);
		?>
	<h3>User Profile  <?= anchor("admin/edit_profile/$user_id",'Edit Profile',['class'=>'btn btn-default btn-xs']); ?></h3>
	
	<fieldset>
	
      <div class="col-lg-8">	
    <div class="row">
	
      <div class="col-lg-12">
        <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">First Name</label>
      <div class="col-lg-8">
		<?php 	
			echo $data[0]['fname'];
		?>
      </div>
    </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Last Name</label>
      <div class="col-lg-8">
		<?php 	
			echo $data[0]['lname'];
		?>	  
      </div>
    </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Email</label>
      <div class="col-lg-8">
		<?php 	
			echo $data[0]['email'];
		?>	  
      </div>
    </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">User Name</label>
      <div class="col-lg-8">
		<?php 	
			echo $data[0]['uname'];
		?>	  
      </div>
    </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">User Name</label>
      <div class="col-lg-8">
		<?php 	
			echo $data[0]['uname'];
		?>	  
      </div>
    </div>
      </div>
    </div>
    </div>
	
      <div class="col-lg-4">	
			<div class="row">
			  <div class="col-lg-6">
				<div class="form-group">
			  <div class="col-lg-12">
				<img src="<?php echo $data[0]['profile_pic']; ?>">  
			  </div>
			  <label for="inputEmail" class="col-lg-12 control-label text-center">Profile Picture</label>
			</div>
			  </div>
			</div>
	</div>
  </fieldset>
</div>

<?php include_once('admin_footer.php'); ?>