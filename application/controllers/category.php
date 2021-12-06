<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('category_model');
	}
	public function index()
	{
		redirect('category/list_category');
	}

	public function categoryForm(){
		$this->load->view('common/header');
		$this->load->view('category/category_form');
		$this->load->view('common/footer');
	}
	public function add_category(){
		$data = $this->category_model->insert_category();
		if($data){
			redirect('category/list_category');
		}
	}
	public function list_category(){
		$category_data =  $this->category_model->list_category();
		$categories = array( 
            'categories' => $category_data
        );
		$this->load->view('common/header');
		$this->load->view('category/list_category',$categories);
		$this->load->view('common/footer');
	}
	public function editCategoryForm($id){
		$category_data =  $this->category_model->get_category($id);
		$categories = array( 
            'categories' => $category_data
        );
		$this->load->view('common/header');
		$this->load->view('category/edit_category',$categories);
		$this->load->view('common/footer');
	}
	public function edit_category(){
		if($this->input->post()){
			$data = $this->category_model->update_category();
			if($data){
				redirect('category/list_category');
			}
		}
	}
	public function delete_category($id){
		$data = $this->category_model->delete_category($id);
		redirect('category/list_category');
	}
}
