<?php
class reservations_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_reservations(){
		$this->db->where('Approved', 0); 
		$this->db->where('Denied', 0); 
		$query = $this->db->get('reservations');
		return $query->result_array();
	}
}