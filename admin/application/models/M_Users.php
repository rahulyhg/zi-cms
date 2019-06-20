<?php 
defined('BASEPATH') or exit('No direct access script allowed');
/**
 * 
 */
class M_Users extends CI_Model{
	
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