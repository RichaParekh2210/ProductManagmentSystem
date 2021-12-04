<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>

<div id="container">
	<h1>Category Form</h1>
	<?php
		echo form_open('category/add_category');
		echo validation_errors();

		echo form_label('Category name'); 
        echo form_input(array('id'=>'category_name','name'=>'category_name')); 
        echo "<br/>"; 
		
        echo form_label('Category Description'); 
        echo form_textarea(array('id'=>'category_desc','name'=>'category_desc')); 
        echo "<br/>"; 
		
        echo form_submit(array('id'=>'add_category','value'=>'add_category')); 

		echo form_close();
	?>
</div>

</body>
</html>