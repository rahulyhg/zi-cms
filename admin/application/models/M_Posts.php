<?php 
defined('BASEPATH') or exit('No direct access script allowed');
/**
 * 
 */
class M_Posts extends CI_Model{
	
	function getPost(){
		$this->db->select('id_post, author, title, date, status, slug');
		return $this->db->get('tb_posts');
	}

	function getById($id){
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
}