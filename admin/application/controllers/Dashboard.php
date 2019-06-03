<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

	private function header($data){
		if (!$this->session->login) {
			redirect('login');
		}
		$this->load->view('_template/header', $data);
	}

	public function index(){
		$data['title'] = 'Dashboard';
		$data['subtitle'] = 'Dashboard';

		$this->header($data);
		$this->load->view('main');
		$this->load->view('_template/footer');
	}

	public function notfound(){
		$data['title'] = '404 Page Not Found';
		$data['subtitle'] = 'Error 404';

		$this->load->view('_template/header', $data);
		$this->load->view('_template/404');
		$this->load->view('_template/footer');
	}
}
