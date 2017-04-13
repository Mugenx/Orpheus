<?php

	class AddUsers_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function insert_user($params){
			//This will prevent a bunch of sql error messages
			//from displaying to user, remove if trying to debug
			$this->db->db_debug = false;
				
			$insertParams = array(
				'StudentNumber' => $params['studentNumber'],
				'UserName'      => $params['userName'],
				'FirstName'     => $params['firstName'],
				'LastName'      => $params['lastName'],
				'Email'         => $params['email'],
				'Program'       => $params['program'],
				'Enabled'       => $params['enabled'],
				'LoanAdmin'     => $params['loanAdmin'],
				'Approver'      => $params['approver'],
				'Year'          => $params['year'],
				'Notes'         => $params['notes'],
				'Password'      => password_hash($params['lastName'], PASSWORD_BCRYPT)
			);
			
			$this->db->insert('users', $insertParams);

            //Re-enabled debug messages
			$this->db->db_debug = true;

			if($this->db->affected_rows() > 0)
				return TRUE;
			else
				return FALSE;
		}

		public function get_programs(){
			$this->db->select('ProgramID, ProgramName');
			$this->db->from('programs');

			$query = $this->db->get();

			return $query->result_array();
		}

	}

?>