<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1>List of Category</h1>
<div class="float-right"><a href="<?php echo base_url();?>category/categoryForm" class="btn btn-primary"><span class="fa fa-plus"></span> Add New</a></div>
<table class="table table-striped" id="categoryList">
	<thead>
		<th>Id</th>
		<th>Category name</th>
		<th>Category Description</th>
		<th>Action</th>
	</thead>
	<tbody>	
		<?php
			foreach ($categories as $category) { 
            ?>
            	<tr> 
                    <td> 
                        <?php echo $category->id ?> 
                    </td> 
                    <td> 
                        <?php echo $category->category_name ?> 
                    </td> 
                    <td> 
                        <?php echo $category->category_desc ?> 
                    </td> 
                    <td style="text-align:center" width="200px"> 
                        <?php  
				            echo anchor(site_url('category/read/'.$category->id),'Read');  
				            echo ' | ';  
				            echo anchor(site_url('category/editCategoryForm/'.$category->id),'Update');  
				            echo ' | ';  
				            echo anchor(site_url('category/delete_category/'.$category->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');  
				            ?> 
				    </td> 
			</tr> 
            <?php 
            } 
            ?> 
	</tbody>
</table>
