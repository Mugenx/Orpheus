<?php
class loanedout_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_history()
	{
			$query = $this->db->get('loanedout');
			return $query->result_array();	
	}


}