<?php
class returns_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_loanedout()
	{
		$query = $this->db->get('loanedout');
		return $query->result_array();	
	}
}