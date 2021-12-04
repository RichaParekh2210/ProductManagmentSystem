<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function category_validation(){
		$this->load->library('form_validation');
		print_r($this->input->post());
		exit();
		$this->form_validation->set_rules('category_name','required|trim');
		$this->form_validation->set_message('required','Please enter Category name');

		if($this->form_validation->run()){
			$this->add_category();
		}else{
			$this->load->view('category/category_form');
		}
	}
	public function add_category(){
		$this->load->model('Category_Model');
		$data=array(
			'category_name' => $this->input->post('category_name'),
			'category_desc' => $this->input->post('category_desc')
		);

		$this->Category_Model->insert_category($data);
		$query = $this->db->get("category"); 
		$data['result'] = $query->result();
		$this->load->view('category/list_category',$data);
	}
	public function add_category_view(){
		$this->load->helper('form');
		$this->load->view('category/category_form');
	}
	public function list_category(){
		$this->load->view('category/list_category');
	}
	public function edit_category(){
		$this->load->view('category/category_form');
	}
	public function delete_category(){
		$this->load->view('category/category_form');
	}
}
