<?php
	class Product_Model extends CI_Model{

		function __construct(){
			parent::__construct();
		}

		function insert_product($categoryData = array()){
			$result = $this->db->insert('product',$categoryData);
			if ($result) {
				return $this->db->insert_id();
			}else{
				return false;
			}
		}

		public function list_product(){
			$this->db->select('p.*,c.category_name');
			$this->db->from('product p');
			$this->db->join('category c','p.category_id = c.id','left');
			$list = $this->db->get();
			return $list->result();
		}

		public function get_product($id){
			$this->db->select('p.*,c.category_name');
			$this->db->from('product p');
			$this->db->join('category c','p.category_id = c.id','left');
			$this->db->where('p.id', $id); 
			$list = $this->db->get('product');
			return $list->result();
		}

		public function update_product(){
			$productData = array(
				'product_name'=>$this->input->post('product_name',true),
				'product_desc'=>$this->input->post('product_desc',true)
			);
			$this->db->where('id', $this->input->post('product_id',true)); 
			$result = $this->db->update('product',$productData);
			return $result;
		}

		public function delete_product($id) 
        { 
	        $this->db->where('id', $id); 
	        $this->db->delete('product'); 
        }
	}
?>