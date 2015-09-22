<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model('products_model');
	}

	public function index() {
		$manufacturers = $this->products_model->get_manufacturer();
		$products = $this->products_model->get_all_products();
		$this->load->view('index', array('manufacturers'=>$manufacturers, 
										 'products'=>$products,
										 ''));
	}

	public function create() {
		$this->products_model->create_product($this->input->post());
		redirect('/');
	}

	public function delete($id) {
		$this->products_model->delete_product($id);
		redirect('/');
	}

	public function update($id) {
		$post = $this->input->post();
		$this->products_model->edit_product($post, $id);
		$this->show($id);
	}

	public function edit($id) {
		$manufacturers = $this->products_model->get_manufacturer();
		$products = $this->products_model->get_product($id);
		$this->load->view('edit', array('manufacturers'=>$manufacturers,
										'products'=>$products));
	}
}