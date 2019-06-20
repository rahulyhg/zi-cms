<?php 
defined('BASEPATH') or exit('No direct access script allowed');
/**
 * 
 */
class M_Auth extends CI_Model{
	
	function login($user){
		$this->db->where(['username' => $user]);
		$this->db->or_where(['email' => $user]);
		return $this->db->get('tb_users');
	}
}