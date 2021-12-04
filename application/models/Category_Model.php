<?php
	class Category_Model extends CI_Model{

		function __construct(){
			parent::__construct();
		}

		function insert_category($data){
			if($this->db->insert('category',$data)){
				return true;
			}
		}
	}
?>