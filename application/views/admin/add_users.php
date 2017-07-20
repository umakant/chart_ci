<?php include('admin_header.php'); ?>

<div class="container">
	<form  name="userForm" action="http://localhost:81/ci_blog/index.php/admin/user_insert" method="post" accept-charset="utf-8" class="form-horizontal">
	
  <fieldset>
    <legend>Add User</legend>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group" ">
      <label for="inputEmail" class="col-lg-4 control-label">First Name</label>
      <div class="col-lg-8">
      <?php echo form_input(['name'=>'fname','class'=>'form-control','placeholder'=>'First Name', 'value'=>set_value('fname')]); ?>
      </div>
    </div>
      </div>
      <div class="col-lg-4">
        <?php echo form_error('fname'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Last Name</label>
      <div class="col-lg-8">
      <?php echo form_input(['name'=>'lname','class'=>'form-control','placeholder'=>'Last Name','value'=>set_value('lname')]); ?>
      </div>
    </div>
      </div>
      <div class="col-lg-4">
        <?php echo form_error('lname'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Email</label>
      <div class="col-lg-8">
      <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email','value'=>set_value('email')]); ?>
      </div>
    </div>
      </div>
      <div class="col-lg-4">
        <?php echo form_error('email'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">User Name</label>
      <div class="col-lg-8">
      <?php echo form_input(['name'=>'uname','class'=>'form-control','placeholder'=>'Username','value'=>set_value('username')]); ?>
      </div>
    </div>
      </div>
      <div class="col-lg-4">
        <?php echo form_error('uname'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Password</label>
      <div class="col-lg-8">
      <?php echo form_password(['name'=>'pword','class'=>'form-control','placeholder'=>'password']) ?>
      </div>
    </div>
      </div>
      <div class="col-lg-4">
        <?php echo form_error('pword'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Confirm Password</label>
      <div class="col-lg-8">
      <?php echo form_password(['name'=>'cpword','class'=>'form-control','placeholder'=>'confirm password']) ?>
      </div>
    </div>
      </div>
      <div class="col-lg-4">
        <?php echo form_error('cpword'); ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <?php 
        	echo form_submit(['name'=>'submit','value'=>'Add User','class'=>'btn btn-primary']);
        ?>
      </div>
    </div>
  </fieldset>
</form>
</div>

<?php include('admin_footer.php'); ?>