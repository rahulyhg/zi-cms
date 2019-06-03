<?php 
defined('BASEPATH') or exit('No direct access script allowed');
/**
 * 
 */
class M_Pages extends CI_Model{
	
	function getPages(){
		return $this->db->get('b_pages');
	}

	function getById($id){
		return $this->db->get_where('b_pages', ['id_pages' => $id]);
	}

	function addPages($data){
		$this->db->insert('b_pages', $data);
	}

	function editPages($data, $where){
		$this->db->where($where);
		$this->db->update('b_pages', $data);
	}

	function deletePages($where){
		$this->db->where($where);
		$this->db->delete('b_pages');
	}
}