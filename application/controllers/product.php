<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Product Controller
	 */
	class Product extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('product_model');
			$this->load->model('category_model');
		}
		public function index(){
			redirect('product/list_product');
		}
		public function productForm(){
			$category_data =  $this->category_model->list_category();
			$categories = array( 
	            'categories' => $category_data
	        );
			$this->load->view('common/header');
			$this->load->view('product/addProduct',$categories);
			$this->load->view('common/footer');
		}
		public function add_product(){
			if($this->input->post('product_add_btn')){
				if(!empty($_FILES['product_img']['name'])){
					$config['upload_path'] =  'assets/uploads/';
					$config['allowed_types'] = 'jpeg|jpg|png|gif';
					$config['max_size'] = '100'; // max_size in kb 
					$config['file_name'] = $_FILES['product_img']['name']; 
					
					// Load upload library 
        			$this->load->library('upload',$config);

					if($this->upload->do_upload('product_img')){
						 // Get data about the file
			            $uploadData = $this->upload->data(); 
			            $image_name = $uploadData['file_name'];  
					}else{
						 $data['upload_error'] = 'failed';  
						 redirect('product/productForm');
					}
				}else{
					$data['upload_error'] = 'failed'; 
					redirect('product/productForm');
				}
			}
			$insert_data = array(
				'product_name'=>$this->input->post('product_name',true),
				'category_id'=>$this->input->post('category_id',true),
				'product_img'=> $image_name,
				'added_date'=>$this->input->post('product_date',true),
			);
			$data = $this->product_model->insert_product($insert_data);
			if($data){
				$this->session->set_flashdata('success_msg','Product Added Successfully!');
				redirect('product/list_product');
			}else{
				$this->session->set_flashdata('error_msg','Some Problem occur...');
				redirect('product/productForm');
			}
		}
		public function list_product(){
			$product_data = $this->product_model->list_product();
			$produtcs = array( 
	            'products' => $product_data
	        );
			$this->load->view('common/header');
			$this->load->view('product/list_product',$produtcs);
			$this->load->view('common/footer');
		}
		public function editProductForm($id){
			$product_data =  $this->product_model->get_product($id);
			$category_data =  $this->category_model->list_category();
			$products = array( 
	            'products' => $product_data,
	            'categories' => $category_data
	        );
			$this->load->view('common/header');
			$this->load->view('product/edit_product',$products);
			$this->load->view('common/footer');
		}
		public function edit_product(){
			if($this->input->post('product_edit_btn')){
				if(!empty($_FILES['product_img']['name'])){
					$config['upload_path'] =  'assets/uploads/';
					$config['allowed_types'] = 'jpeg|jpg|png|gif';
					$config['max_size'] = '100'; // max_size in kb 
					$config['file_name'] = $_FILES['product_img']['name']; 
					
					// Load upload library 
        			$this->load->library('upload',$config);

					if($this->upload->do_upload('product_img')){
						 // Get data about the file
			            $uploadData = $this->upload->data(); 
			            $image_name = $uploadData['file_name'];  
					}else{
						 $data['upload_error'] = 'failed';  
						 redirect('product/editProductForm');
					}
				}else{
					$data['upload_error'] = 'failed'; 
					redirect('product/editProductForm');
				}
			}
			$update_data = array(
				'product_id'=>$this->input->post('product_id',true),
				'product_name'=>$this->input->post('product_name',true),
				'category_id'=>$this->input->post('category_id',true),
				'product_img'=> $image_name,
				'added_date'=>$this->input->post('product_date',true),
			);
			$data = $this->product_model->update_product($update_data);
			if($data){
				$this->session->set_flashdata('success_msg','Product Added Successfully!');
				redirect('product/list_product');
			}else{
				$this->session->set_flashdata('error_msg','Some Problem occur...');
				redirect('product/editProductForm');
			}
		}
		public function delete_product($id){
			$data = $this->product_model->delete_product($id);
			redirect('product/list_product');
		}
	}
?>