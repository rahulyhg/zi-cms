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
	public function __construct(){
		parent::__construct();
		if (!$this->session->login) {
			redirect('login');
		}
		$this->load->model('M_Admin', 'model');
	}

	private function header($data){
		$this->load->view('_template/header', $data);
	}

	// Dashboard
	public function index(){
		$data['title'] = 'Dashboard';
		$data['subtitle'] = 'Dashboard';

		$this->header($data);
		$this->load->view('main');
		$this->load->view('_template/footer');
	}

	// Posts
	public function posts(){
		$data = [
			'title' => 'Posts',
			'subtitle' => 'All Posts',
			'posts' => $this->model->getPost()->result()
		];

		$this->header($data);
		$this->load->view('v_posts');
		$this->load->view('_template/footer');
	}

	public function addPost(){
		$data = [
			'title' => 'New Posts',
			'subtitle' => 'Add New Post',
			'template' => ['sidebar-collapse'],
			'list_cat' => $this->model->listCat()->result()
		];

		$this->header($data);
		$this->load->view('v_posts_new');
		$this->load->view('_template/footer');
	}

	public function editPost($id){
		$data = ['title' => 'Edit Post',
			'subtitle' => 'Edit Post',
			'template' => ['sidebar-collapse'],
			'list_cat' => $this->model->listCat()->result(),
			'post' => $this->model->postGetById($id)->row()
		];
		$data['post_cat'] = $this->model->postCat($data['post']->id_post)->result();

		$this->header($data);
		$this->load->view('v_posts_edit');
		$this->load->view('_template/footer');
	}

	// Pages
	public function pages(){
		$data = [
			'title' => 'Pages',
			'subtitle' => 'All Pages',
			'pages' => $this->model->getPages()->result()
		];

		$this->header($data);
		$this->load->view('v_pages');
		$this->load->view('_template/footer');
	}

	public function addPages(){
		$data = [
			'title' => 'New Pages',
			'subtitle' => 'Add New Page',
			'template' => ['sidebar-collapse']
		];

		$this->header($data);
		$this->load->view('v_pages_new');
		$this->load->view('_template/footer');
	}

	public function editPages($id){
		$data = [
			'title' => 'Edit Page',
			'subtitle' => 'Edit Page',
			'template' => ['sidebar-collapse'],
			'pages' => $this->model->pagesGetById($id)->row()
		];

		$this->header($data);
		$this->load->view('v_pages_edit');
		$this->load->view('_template/footer');
	}

	// Categories
	public function categories(){
		$data = [
			'title' => 'Categories',
			'subtitle' => 'All Categories',
			'categories' => $this->model->getCategory()->result()
		];

		$this->header($data);
		$this->load->view('v_categories');
		$this->load->view('_template/footer');
	}

	// Media
	public function media(){
		$data['title'] = 'Media';
		$data['subtitle'] = 'All Media';

		$this->header($data);
		$this->load->view('v_media');
		$this->load->view('_template/footer');
	}

	// Users
	public function users(){
		$data = [
			'title' => 'Users',
			'subtitle' => 'All User',
			'users' => $this->model->getUsers()->result()
		];

		$this->header($data);
		$this->load->view('v_users');
		$this->load->view('_template/footer');
	}

	// Setting
	public function setting(){

	}

	public function notfound(){
		$data['title'] = '404 Page Not Found';
		$data['subtitle'] = 'Error 404';

		$this->load->view('_template/header', $data);
		$this->load->view('_template/404');
		$this->load->view('_template/footer');
	}
}
