<h1>Product Form</h1>
<p><?php echo $this->session->flashdata('error_msg'); ?></p>
<?php if(isset($upload_error)){ ?>
	<p><?php echo $upload_error; ?></p>
<?php } ?>
<form method="post" id="product_form" action="<?php echo base_url();?>product/add_product" enctype="multipart/form-data">
	<?php if($products){ ?>
		<?php foreach ($products as $product) { ?>
			<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
			<div class="form-group">
				<label>Product Name</label>
				<input type="text" name="product_name" class="form-control" placeholder="product name" value="<?php echo $product->product_name; ?>">
				<p id="error_product_name" class="error-msg text-danger" style="display: none;">Please enter product name</p>
			</div>
			<div class="form-group">
				<label>Category</label>
				<?php if($categories){ ?>
					<select name="category_id">
						<option value="<?php echo $product->category_id ?>" selected=""><?php echo $product->category_name; ?></option>
					<?php foreach ($categories as $category) { ?>
						<option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
					<?php } ?>
					</select>
				<?php } ?>
				<p id="error_product_category" class="error-msg text-danger" style="display: none;">Please Select product category</p>
			</div>
			<div class="form-group">
				<label>Product Image</label>
				<input type="file" name="product_img" value="<?php echo $product->product_img ?>" class="form-control" placeholder="product image">
				<p id="error_product_img" class="error-msg text-danger" style="display: none;">Please upload product image</p>
			</div>
			<div class="form-group">
				<label>Date</label>
				<input type="date" name="product_date" value="<?php echo $product->added_date; ?>" class="form-control" placeholder="product image">
				<p id="error_product_date" class="error-msg text-danger" style="display: none;">Please select product date</p>
			</div>
		<?php } } ?>
	<div class="form-group">
		<button type="submit" name="product_edit_btn"class="btn btn-success btn-submit-product" value="edit">Edit product</button>
	</div>
</form>
