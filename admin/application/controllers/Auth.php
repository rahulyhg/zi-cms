<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		$this->load->model('M_Auth', 'model');
	}

	private function is_login(){
		if ($this->session->login) {
			redirect('');
		}
	}

	public function index(){
		$this->is_login();

		$data = [
			'title' => 'Login'
		];

		$this->load->view('_template/login', $data);
	}

	public function login(){
		$this->is_login();

		$user = $this->input->post('user');
		$password = $this->input->post('password');

		$data = $this->model->login($user)->row_array();

		if (count($data) > 0) {
			// proses login
			if (password_verify($password, $data['password'])) {
				// Cek remember me
				if ($this->input->post('remember')) {
					# set cookie
					// set_cookie('login', 'true', time() + 60);
					// set_cookie($name[, $value = ''[, $expire = ''[, $domain = ''[, $path = '/'[, $prefix = ''[, $secure = NULL[, $httponly = NULL]]]]]]])
				}

				$userdata = [
					'username' => $data['username'],
					'full_name' => $data['full_name'],
					'email' => $data['email'],
					'login' => TRUE
				];
				$this->session->set_userdata($userdata);
				redirect('');
			}
			else{
				// Password salah
				$this->session->set_flashdata('msg', 'Password salah!');
				redirect('login');
			}
		}
		else{
			// Username / email salah
			$this->session->set_flashdata('msg', 'Username/Email salah!');
			redirect('login');
		}

		// // // // //

		// if ($this->input->post('remember')) {
		// 	// Cookie
		// 	echo "remember";
		// }
		// else{
		// 	// not Cookie
		// 	$data = $this->model->login($user)->row_array();

		// 	if (count($data) > 0) {
		// 		// proses login
		// 		if (password_verify($password, $data['password'])) {
		// 			$userdata = [
		// 				'username' => $data['username'],
		// 				'full_name' => $data['full_name'],
		// 				'email' => $data['email'],
		// 				'login' => TRUE
		// 			];
		// 			$this->session->set_userdata($userdata);
		// 			redirect('');
		// 		}
		// 		else{
		// 			// Password salah
		// 			$this->session->set_flashdata('msg', 'Password salah!');
		// 			redirect('login');
		// 		}
		// 	}
		// 	else{
		// 		// Username / email salah
		// 		$this->session->set_flashdata('msg', 'Username/Email salah!');
		// 		redirect('login');
		// 	}
		// }
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
