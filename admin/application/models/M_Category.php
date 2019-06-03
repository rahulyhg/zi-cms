<?php 
defined('BASEPATH') or exit('No direct access script allowed');
/**
 * 
 */
class M_Category extends CI_Model{
	
	function getCategory(){
		return $this->db->get('b_category');
	}

	function addCategory($data){
		$this->db->insert('b_category', $data);
	}

	function editCategory($data, $where){
		$this->db->where($where);
		$this->db->update('b_category', $data);
	}

	function deleteCategory($where){
		$this->db->where($where);
		$this->db->delete('b_category');
	}
}