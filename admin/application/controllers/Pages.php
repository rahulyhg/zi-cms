<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

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
		$this->load->model('M_Admin', 'model');
	}

	// Add Pages
	public function new(){
		$data = [
			'title' => 'New Pages',
			'subtitle' => 'Add New Page',
			'template' => ['sidebar-collapse']
		];

		$this->load->view('_template/header', $data);
		$this->load->view('v_pages_new');
		$this->load->view('_template/footer');
	}
	// Action add
	public function add(){
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$status = $this->input->post('status');
		if (empty($this->input->post('slug'))) {
			$slug = str_replace(' ', '-', strtolower($title));
		}
		else{
			$slug = str_replace(' ', '-', strtolower($this->input->post('slug')));
		}
		$date = date('Y-m-d H:i:s');
		$data = [
			'title' => $title,
			'content' => $content,
			'date' => $date,
			'slug' => $slug,
			'status' => $status
		];

		$this->model->addPages($data);
		$this->session->set_flashdata('success', 'Berhasil ditambahkan!');
		redirect('pages');
	}

	// Edit Pages
	public function edit($id){
		$data = [
			'title' => 'Edit Page',
			'subtitle' => 'Edit Page',
			'template' => ['sidebar-collapse'],
			'pages' => $this->model->pagesGetById($id)->row()
		];

		$this->load->view('_template/header', $data);
		$this->load->view('v_pages_edit');
		$this->load->view('_template/footer');
	}
	// Action edit
	public function editpages($id){
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$status = $this->input->post('status');
		if (empty($this->input->post('slug'))) {
			$slug = str_replace(' ', '-', strtolower($title));
		}
		else{
			$slug = str_replace(' ', '-', strtolower($this->input->post('slug')));
		}
		$date = date('Y-m-d H:i:s');
		$data = [
			'title' => $title,
			'content' => $content,
			'date' => $date,
			'slug' => $slug,
			'status' => $status
		];

		$this->model->editPages($data, ['id_pages' => $id]);
		$this->session->set_flashdata('success', 'Berhasil diubah!');
		redirect('pages');
	}

	// Delete Pages
	public function delete($id){
		$this->model->deletePages(['id_pages' => $id]);
		$this->session->set_flashdata('success', 'Berhasil dihapus!');
		redirect('pages');
	}
}
