<?php
class equiplist_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_equipments()
	{
		$query = $this->db->get('equipment');
		return $query->result_array();	
	}
}