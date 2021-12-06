$(document).ready(function(){
	$('.btn-submit-category').click(function(){
		var category_name = $('input[name="category_name"]').val();
		var category_desc = $('textarea[name="category_desc"]').val();
		if(category_name == ''){
			$('#error_category_name').css('display','block');
			return false;
		}else{
			return true;
		}
	});

	$("#categoryList").dataTable(); 

	$('.btn-submit-product').click(function(){
		var error = 0;
		var product_name = $('input[name="product_name"]').val();
		var category_id = $('select[name="category_id"] option:selected').val();
		var product_img = $('input[name="product_img"]').val();
		var product_date = $('input[name="product_date"]').val();
		if(product_name == ''){
			$('#error_product_name').css('display','block');
			error = 0;
		}else if(category_id == '' || category_id == 0){
			$('#error_product_category').css('display','block');
			error = 0;
		}else if(product_img == ''){
			$('#error_product_img').css('display','block');
			error = 0;
		}else if(product_img == ''){
			$('#error_product_img').css('display','block');
			error = 0;
		}else if(product_date == ''){
			$('#error_product_date').css('display','block');
			error = 0;
		}else{
			error = 1;
		}

		if(error == 0){
			return false;
		}else{
			return true;
		}
	});

	$("#productList").dataTable();
});