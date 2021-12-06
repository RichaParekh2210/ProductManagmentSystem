<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1>List of Product</h1>
<p class="text-success"><?php echo $this->session->flashdata('success_msg'); ?></p>
<div class="float-right"><a href="<?php echo base_url();?>product/productForm" class="btn btn-primary"><span class="fa fa-plus"></span>Add New</a></div>
<table class="table table-striped" id="productList">
	<thead>
		<th>Id</th>
		<th>Product name</th>
		<th>Category name</th>
		<th>Product Image</th>
		<th>Date</th>
		<th>Action</th>
	</thead>
	<tbody>	
		<?php
			foreach ($products as $product) { 
            ?>
            	<tr> 
                    <td> 
                        <?php echo $product->id ?> 
                    </td> 
                    <td> 
                        <?php echo $product->product_name ?> 
                    </td> 
                    <td> 
                        <?php echo $product->category_name ?> 
                    </td>
                    <td> 
                        <img src="<?php echo base_url();?>/assets/uploads/<?php echo $product->product_img ?>" height="100" width="100"> 
                    </td> 
                    <td> 
                        <?php echo $product->added_date ?> 
                    </td> 
                    <td style="text-align:center" width="200px"> 
                        <?php  
				            echo anchor(site_url('product/read/'.$product->id),'Read');  
				            echo ' | ';  
				            echo anchor(site_url('product/editProductForm/'.$product->id),'Update');  
				            echo ' | ';  
				            echo anchor(site_url('product/delete_product/'.$product->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');  
				            ?> 
				    </td> 
			</tr> 
            <?php 
            } 
            ?> 
	</tbody>
</table>
