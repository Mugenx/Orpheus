<?php
class login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_users($LoginUserName)
	{
		$this->db->where('StudentNumber', $str2 = substr($LoginUserName, 1));
		$query = $this->db->get('users');
		return $query->result_array();

	}
}