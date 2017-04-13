<?php
class overdue_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_history()
	{
		$NOW = date("m/d/Y");
		$this->db->where('DueDate <', $NOW);
		$query = $this->db->get('loanedout');
		return $query->result_array();	
	}


}