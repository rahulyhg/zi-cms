<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

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
	public function __construct(){
		parent::__construct();
		if (!$this->session->login) {
			redirect('login');
		}
		$this->load->model('M_Category', 'model');
	}

	public function index(){
		$data = [
			'title' => 'Categories',
			'subtitle' => 'All Categories',
			'categories' => $this->model->getCategory()->result()
		];

		$this->load->view('_template/header', $data);
		$this->load->view('v_categories');
		$this->load->view('_template/footer');
	}

	public function add(){
		$name = $this->input->post('name');
		$slug = strtolower($this->input->post('slug'));

		if (empty($slug)) {
			$data = ['name' => $name, 'slug' => strtolower($name)];
		}
		else{
			$data = ['name' => $name, 'slug' => $slug];
		}

		$this->model->addCategory($data);
		redirect($this->agent->referrer());
	}

	public function edit($id){
		$name = $this->input->post('name');
		$slug = strtolower($this->input->post('slug'));

		if (empty($slug)) {
			$data = ['name' => $name, 'slug' => strtolower($name)];
		}
		else{
			$data = ['name' => $name, 'slug' => $slug];
		}

		$this->model->editCategory($data, ['id_category' => $id]);
		redirect($this->agent->referrer());
	}

	public function delete($id){
		$this->model->deleteCategory(['id_category' => $id]);
		redirect($this->agent->referrer());
	}

	public function getById($id){
		header('Content-Type: application/json');
		$data = $this->db->get_where('b_category', ['id_category' => $id])->row();
		echo json_encode($data);
	}
}
