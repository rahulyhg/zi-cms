<?php 
defined('BASEPATH') or exit('No direct access script allowed');
/**
 * 
 */
class M_Category extends CI_Model{
	
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
}