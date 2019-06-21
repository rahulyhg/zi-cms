<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_Admin extends CI_Model{
	
	// Posts
	function getPost(){
		$this->db->select('id_post, author, title, date, status, slug');
		return $this->db->get('tb_posts');
	}

	function postGetById($id){
		return $this->db->get_where('tb_posts', ['id_post' => $id]);
	}

	function addPost($data){
		$this->db->insert('tb_posts', $data);
	}

	function addPostCat($data){
		$this->db->insert('tb_posts_cat', $data);
	}

	function editPost($data, $where){
		$this->db->where($where);
		$this->db->update('tb_posts', $data);
	}

	function deletePost($where){
		$this->db->where($where);
		$this->db->delete('tb_posts');
	}

	function listCat(){
		$this->db->select('id_category, name');
		return $this->db->get('b_category');
	}

	function postCat($id){
		$this->db->select('category');
		return $this->db->get_where('tb_posts_cat', ['post' => $id]);
	}

	function deletePostCat($id){
		$this->db->where(['post' => $id]);
		$this->db->delete('tb_posts_cat');
	}

	// Pages
	function getPages(){
		return $this->db->get('tb_pages');
	}

	function pagesGetById($id){
		return $this->db->get_where('tb_pages', ['id_pages' => $id]);
	}

	function addPages($data){
		$this->db->insert('tb_pages', $data);
	}

	function editPages($data, $where){
		$this->db->where($where);
		$this->db->update('tb_pages', $data);
	}

	function deletePages($where){
		$this->db->where($where);
		$this->db->delete('tb_pages');
	}

	// Categories
	function getCategory(){
		return $this->db->get('tb_category');
	}

	function addCategory($data){
		$this->db->insert('tb_category', $data);
	}

	function editCategory($data, $where){
		$this->db->where($where);
		$this->db->update('tb_category', $data);
	}

	function deleteCategory($where){
		$this->db->where($where);
		$this->db->delete('tb_category');
	}

	// Users
	function getUsers(){
		return $this->db->get('tb_users');
	}

	function getUserById($id){
		$this->db->select('username, email, full_name');
		return $this->db->get_where('tb_users', ['id_user' => $id]);
	}

	function addUser($data){
		$this->db->insert('tb_users', $data);
	}

	function editUser($data, $where){
		$this->db->where($where);
		$this->db->update('tb_users', $data);
	}

	function deleteUser($where){
		$this->db->where($where);
		$this->db->delete('tb_users');
	}
}