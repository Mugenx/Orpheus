<?php
class loanHistory_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_history()
	{
			$query = $this->db->get('loanhistory');
			return $query->result_array();	
	}


}