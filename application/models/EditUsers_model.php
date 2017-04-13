<?php

	class EditUsers_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}

		public function get_userinfo($studentNumber){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where("StudentNumber = '$studentNumber'");

			$query = $this->db->get();

			return $query->result_array();
		}

		public function get_programinfo(){
			$this->db->select('ProgramID, ProgramName');
			$this->db->from('programs');

			$query = $this->db->get();

			return $query->result_array();
		}
		
		public function update_user($params, $studentNumber){

            //This will prevent sql error messages from displaying to user
            //Remove if debugging
			$this->db->db_debug = false;
				
			$updateParams = array(
				'UserName'      => $params['userName'],
				'FirstName'     => $params['firstName'],
				'LastName'      => $params['lastName'],
				'Email'         => $params['email'],
				'Program'       => $params['program'],
				'Enabled'       => $params['enabled'],
				'LoanAdmin'     => $params['loanAdmin'],
				'Approver'      => $params['approver'],
				'Year'          => $params['year'],
				'Notes'         => $params['notes']
			);
			
			$this->db->where('StudentNumber', $studentNumber);
			$this->db->update('users', $updateParams);

            //Re-Enable debugging messages
            $this->db->db_debug = true;

			if ($this->db->affected_rows() > 0)
				return TRUE;
			else
				return FALSE;
		}

		public function get_lastname($studentNumber){
			$this->db->select('LastName');
			$this->db->from('users');
			$this->db->where('StudentNumber', $studentNumber);

			$query = $this->db->get();

            $return = $query->row();

            return $return->LastName;
		}

		public function resetpassword($lastName, $studentNumber){
            $this->db->where('StudentNumber', $studentNumber);
			$this->db->update('users', array('Password' => password_hash($lastName, PASSWORD_BCRYPT)));

			if($this->db->affected_rows() > 0)
				return TRUE;
			else
				return FALSE;
		}

	}

?>