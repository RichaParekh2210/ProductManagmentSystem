$(document).ready( function(){
	var baseUrl = "http://localhost/ci-demo/index.php/";
	listCategory();	
	var table = $('#categoryList').dataTable({     
		"bPaginate": false,
		"bInfo": false,
		"bFilter": false,
		"bLengthChange": false,
		"pageLength": 5		
	}); 
	function listCategory(){
		$.ajax({
			type  : 'ajax',
			url: baseUrl+'category/list_category',
			async : false,
			dataType : 'json',
			success : function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html += '<tr id="'+data[i].id+'">'+
							'<td>'+data[i].category_name+'</td>'+
							'<td>'+data[i].category_desc+'</td>'+
							'<td style="text-align:right;">'+
								'<a href="javascript:void(0);" class="btn btn-info btn-sm editCategory" data-id="'+data[i].id+'" data-name="'+data[i].name+'" data-age="'+data[i].age+'" data-skills="'+data[i].skills+'" data-designation="'+data[i].designation+'" data-address="'+data[i].address+'">Edit</a>'+' '+
								'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteCategory" data-id="'+data[i].id+'">Delete</a>'+
							'</td>'+
							'</tr>';
				}
				$('#listCategoryData').html(html);					
			}
		});
	}
	$('.error-msg').hide();
	$('#category_form').submit('click',function(){
			var category_name = $('input[name="category_name"]').val();
			var category_desc = $('textarea[name="category_desc"]').val();

			if(category_name == ''){
				$('#error_category_name').show();
				return false;
			}else{
				$.ajax({
					type : "POST",
					url  : baseUrl+"category/add_category",
					dataType : "JSON",
					data : {category_name:category_name, category_desc:category_desc},
					success: function(data){
						listCategory();
					}
				});
			}
		return false;
	});
});