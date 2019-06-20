<?php 
defined('BASEPATH') or exit('No direct access script allowed');
/**
 * 
 */
class M_Pages extends CI_Model{
	
	function getPages(){
		return $this->db->get('tb_pages');
	}

	function getById($id){
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
}