<?php
	class Category_Model extends CI_Model{

		function __construct(){
			parent::__construct();
		}

		function insert_category(){
			$categoryData = array(
				'category_name'=>$this->input->post('category_name',true),
				'category_desc'=>$this->input->post('category_desc',true)
			);
			$result = $this->db->insert('category',$categoryData);
			return $result;
		}

		public function list_category(){
			$list = $this->db->get('category');
			return $list->result();
		}

		public function get_category($id){
			$this->db->where('id', $id); 
			$list = $this->db->get('category');
			return $list->result();
		}

		public function update_category(){
			$categoryData = array(
				'category_name'=>$this->input->post('category_name',true),
				'category_desc'=>$this->input->post('category_desc',true)
			);
			$this->db->where('id', $this->input->post('category_id',true)); 
			$result = $this->db->update('category',$categoryData);
			return $result;
		}

		public function delete_category($id) 
        { 
	        $this->db->where('id', $id); 
	        $this->db->delete('category'); 
        }
	}
?>