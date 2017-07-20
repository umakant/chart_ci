<?php include_once('admin_header.php'); ?>

<div class="container right-side">
	<?php echo form_open_multipart('store/store_product', ['class'=>'form-horizontal']) ?>
	<?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>
	<?= form_hidden('created_at', date('Y-m-d H:i:s')) ?>
  <fieldset>
    <legend>Add Product</legend>
    
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
		  <label for="inputProductName" class="col-lg-2 control-label">Product Name</label>
		  <div class="col-lg-10">
		  <?php echo form_input(['name'=>'product_name','class'=>'form-control','placeholder'=>'Product Name','value'=>set_value('product_name')]); ?>
		  </div>
		</div>
      </div>
      <div class="col-lg-6">
        <?php echo form_error('product_name'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
      <label for="inputProductDesc" class="col-lg-2 control-label">Product Description</label>
      <div class="col-lg-10">
      <?php echo form_textarea(['name'=>'product_description','class'=>'form-control','placeholder'=>'Product Description','value'=> set_value('product_description')]) ?>
      </div>
    </div>
      </div>
      <div class="col-lg-6">
        <?php echo form_error('product_description'); ?>
      </div>
    </div>
    <div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label for="inputProductimage" class="col-lg-2 control-label">Select Product Image</label>
				<div class="col-lg-10">
				<?php echo form_upload(['name'=>'product_image','class'=>'form-control']); ?>
				</div>
			</div>
		</div>
      <div class="col-lg-6">
        <?php if(isset($upload_error)) echo $upload_error ?>
      </div>
	</div>
    <div class="row">  
      <div class="col-lg-6">
        <div class="form-group">
		  <label for="inputProductQty" class="col-lg-6 control-label">Product Quantity</label>
		  <div class="col-lg-6">
			<?php echo form_input(['name'=>'product_qty','class'=>'form-control','placeholder'=>'Product Quantity','value'=>set_value('product_qty')]); ?>
		  </div>
		</div>
      </div>
	  
      <div class="col-lg-6">
        <?php echo form_error('product_qty'); ?>
      </div>
	</div> 
    <div class="row">  
      <div class="col-lg-6">
        <div class="form-group">
		  <label for="inputProductPrice" class="col-lg-6 control-label">Product Price</label>
		  <div class="col-lg-6">
			<?php echo form_input(['name'=>'product_price','class'=>'form-control','placeholder'=>'Product Price','value'=>set_value('product_price')]); ?>
		  </div>
		</div>
      </div>
	  
	  
      <div class="col-lg-6">
        <?php echo form_error('product_price'); ?>
      </div>
	</div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">

        <?php 
        	echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']),
        		form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary']);
        ?>
      </div>
    </div>
  </fieldset>
</form>
</div>

<?php include_once('admin_footer.php'); ?>