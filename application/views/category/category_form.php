<h1>Category Form</h1>
<form method="post" id="category_form" action="<?php echo base_url();?>category/add_category">
	<div class="form-group">
		<label>Catgory Name</label>
		<input type="text" name="category_name" class="form-control" placeholder="Category name">
		<p id="error_category_name" class="error-msg text-danger" style="display: none;">Please enter category name</p>
	</div>
	<div class="form-group">
		<label>Catgory Description</label>
		<textarea name="category_desc" class="form-control" placeholder="Category name"></textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success btn-submit-category">Add Category</button>
	</div>
</form>
