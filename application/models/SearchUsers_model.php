<?php

	class SearchUsers_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}

		public function get_userinfo($firstNameSearch, $lastNameSearch){

            $this->db->select('StudentNumber, UserName, FirstName, LastName');
            $this->db->from('users');
            $this->db->like('FirstName', $firstNameSearch);
            $this->db->like('LastName', $lastNameSearch);
            
            $query = $this->db->get();

            return $query->result_array();
		}

	}

?>