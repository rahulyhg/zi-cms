<?php 
defined('BASEPATH') or exit('No direct access script allowed');
/**
 * 
 */
class M_Users extends CI_Model{
	
	function getUsers(){
		return $this->db->get('b_users');
	}

	function getUserById($id){
		$this->db->select('username, email, full_name');
		return $this->db->get_where('b_users', ['id_user' => $id]);
	}

	function addUser($data){
		$this->db->insert('b_users', $data);
	}

	function editUser($data, $where){
		$this->db->where($where);
		$this->db->update('b_users', $data);
	}

	function deleteUser($where){
		$this->db->where($where);
		$this->db->delete('b_users');
	}
}