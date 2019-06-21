<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

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

	// Action add
	public function add(){
		// insert post
		// $author = 1;
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$date = date('Y-m-d H:i:s');
		$status = $this->input->post('status');
		$slug = str_replace(' ', '-', strtolower($title));
		$data = [
			'author' => 1,
			'title' => $title,
			'content' => $content,
			'date' => $date,
			'status' => $status,
			'slug' => $slug
		];
		$this->model->addPost($data);

		$post = $this->db->insert_id();

		// insert post category
		$categories = $this->input->post('categories');
		if (empty($categories)) {
			$cat_data = [
				'post' => $post,
				'category' => 1
			];
			$this->model->addPostCat($cat_data);
		}
		else{
			$cat_data = [];
			foreach ($categories as $cat) {
				$cat = [
					'post' => $post,
					'category' => $cat
				];
				array_push($cat_data, $cat);
			}
			$this->db->insert_batch('tb_posts_cat', $cat_data);
		}

		redirect('posts');
	}

	// Action edit
	public function editpost($id){
		// edit post
		// $author = 1;
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$date = date('Y-m-d H:i:s');
		$status = $this->input->post('status');
		$slug = str_replace(' ', '-', strtolower($title));
		$data = [
			'author' => 1,
			'title' => $title,
			'content' => $content,
			'date' => $date,
			'status' => $status,
			'slug' => $slug
		];
		$this->model->editPost($data, ['id_post' => $id]);

		// edit post category
		$this->model->deletePostCat($id);
		$categories = $this->input->post('categories');
		if (empty($categories)) {
			$cat_data = [
				'post' => $id,
				'category' => 1
			];
			$this->model->addPostCat($cat_data);
		}
		else{
			$cat_data = [];
			foreach ($categories as $cat) {
				$cat = [
					'post' => $id,
					'category' => $cat
				];
				array_push($cat_data, $cat);
			}
			$this->db->insert_batch('tb_posts_cat', $cat_data);
		}

		redirect('posts');
	}
}
