<h1>Product Form</h1>
<p><?php echo $this->session->flashdata('error_msg'); ?></p>
<?php if(isset($upload_error)){ ?>
	<p><?php echo $upload_error; ?></p>
<?php } ?>
<form method="post" id="product_form" action="<?php echo base_url();?>product/add_product" enctype="multipart/form-data">
	<div class="form-group">
		<label>Product Name</label>
		<input type="text" name="product_name" class="form-control" placeholder="product name">
		<p id="error_product_name" class="error-msg text-danger" style="display: none;">Please enter product name</p>
	</div>
	<div class="form-group">
		<label>Category</label>
		<?php if($categories){ ?>
			<select name="category_id">
				<option value="0" selected="">Select Category</option>
			<?php foreach ($categories as $category) { ?>
				<option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
			<?php } ?>
			</select>
		<?php } ?>
		<p id="error_product_category" class="error-msg text-danger" style="display: none;">Please Select product category</p>
	</div>
	<div class="form-group">
		<label>Product Image</label>
		<input type="file" name="product_img" class="form-control" placeholder="product image">
		<p id="error_product_img" class="error-msg text-danger" style="display: none;">Please upload product image</p>
	</div>
	<div class="form-group">
		<label>Date</label>
		<input type="date" name="product_date" class="form-control" placeholder="product image">
		<p id="error_product_date" class="error-msg text-danger" style="display: none;">Please select product date</p>
	</div>
	<div class="form-group">
		<button type="submit" name="product_add_btn" class="btn btn-success btn-submit-product" value="add_product">Add product</button>
	</div>
</form>
