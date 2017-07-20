<?php include_once('admin_header.php'); ?>

<div class="container right-side">
	<h3>Edit Profile</h3>
	
		<?php 
			$user_id = $this->uri->segment(3);
			$q = $this->db->select('*')
					      ->where('id', $user_id)
						  ->get('users');
			$data = $q->result_array(); 
			//print_r($data);
		?>
	
	<?php echo form_open_multipart("admin/update_profile_complete/{$user_id}", ['class'=>'form-horizontal']) ?>
	<?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>
	
 <div class="col-lg-6">
	<fieldset>
    <div class="row">
      <div class="col-lg-12">
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-4 control-label">First Name</label>
			  <div class="col-lg-8">
				<?php echo form_input(['name'=>'fname','class'=>'form-control','placeholder'=>'First Name','value'=>set_value('fname', $data[0]['fname'])]); ?>
				<?php echo form_error('fname'); ?>
			  </div>
			</div>
		</div>	
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
		  <label for="inputEmail" class="col-lg-4 control-label">Last Name</label>
		  <div class="col-lg-8">
			<?php echo form_input(['name'=>'lname','class'=>'form-control','placeholder'=>'Last Name','value'=>set_value('lname', $data[0]['lname'])]); ?>
		  </div>
		</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
		  <label for="inputEmail" class="col-lg-4 control-label">Email</label>
		  <div class="col-lg-8">
			<?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email','value'=>set_value('email', $data[0]['email'])]); ?>
			<?php echo form_error('email'); ?>
		  </div>
		</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
		  <label for="inputEmail" class="col-lg-4 control-label">User Name</label>
		  <div class="col-lg-8">
			<?php echo form_input(['name'=>'uname','class'=>'form-control','placeholder'=>'User Name','value'=>set_value('uname', $data[0]['uname'])]); ?>
		  </div>
		</div>
      </div>
    </div>	
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <?php 
        	echo form_submit(['name'=>'submit','value'=>'Update Profile','class'=>'btn btn-primary']);
        ?>
      </div>
    </div>
	</fieldset>
</div>

 <div class="col-lg-6">
	<div class="row">
      <div class="col-lg-9">
		<img src="<?php echo $data[0]['profile_pic']; ?>">
        <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Select Image</label>
      <div class="col-lg-8">
		<?php echo form_upload(['name'=>'profile_pic','class'=>'form-control']); ?>
      </div>
    </div>
      </div>
      <div class="col-lg-3">
		<?php echo form_error('profile_pic'); ?>
        <?php if(isset($upload_errors)) echo 'Skhsdjig'.$upload_errors ?>
      </div>
    </div>
 </div>
	</form>
</div>

<?php include_once('admin_footer.php'); ?>