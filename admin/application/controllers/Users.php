<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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

	public function add(){
		$full_name = $this->input->post('full_name');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		$level = $this->input->post('level');
		$data = [
			'username' => $username,
			'password' => $password, 
			'full_name' => $full_name,
			'email' => $email,
			'level' => $level,
			'status' => 1
		];
		$this->model->addUser($data);
		redirect('users');
	}

	public function edit($id){
		$full_name = $this->input->post('full_name');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$data = [
			'username' => $username,
			'full_name' => $full_name,
			'email' => $email,
		];
		if ($this->input->post('password')) {
			$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			$data['password'] = $password;
		}
		if ($this->input->post('level')) {
			$level = $this->input->post('level');
			$data['level'] = $level;
		}

		$this->model->editUser($data, ['id_user' => $id]);
		redirect('users');
	}

	public function delete($id){
		$this->model->deleteUser(['id_user' => $id]);
		redirect('users');
	}

	public function getById($id){
		header('Content-Type: application/json');
		$data = $this->model->getUserById($id)->row();
		echo json_encode($data);
	}
}
