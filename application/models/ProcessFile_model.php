<?php

	class ProcessFile_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}

		public function checkIfUserExists($studentNumber){

			$this->db->select('StudentNumber');
			$this->db->from('users');
			$this->db->where('StudentNumber', $studentNumber);

			$query = $this->db->get();
            
            if($query->num_rows() == 0)
            	return TRUE;
            else
            	return FALSE;

		}

		public function processfile($data, $processMethod){

            //If user does not exists, create user
            if($processMethod == 1){
	            $this->db->insert('users', array('StudentNumber' => $data[0],
	            	                             'UserName'      => $data[1],
	            	                             'FirstName'     => $data[2],
	            	                             'LastName'      => $data[3],
	            	                             'Email'         => $data[4],
	            	                             'Program'       => $data[5],
	            	                             'Enabled'       => $data[6],
	            	                             'LoanAdmin'     => $data[7],
	            	                             'Approver'      => $data[8],
	            	                             'Year'          => $data[9],
	            	                             'Notes'         => $data[10],
	            	                             'Password'      => $data[3]));
	        }
	        //Else if user exists, update existing user
	        else if($processMethod == 2){
	        	$this->db->where('StudentNumber', $data[0]);
	        	$this->db->update('users', array('StudentNumber' => $data[0],
	            	                             'UserName'      => $data[1],
	            	                             'FirstName'     => $data[2],
	            	                             'LastName'      => $data[3],
	            	                             'Email'         => $data[4],
	            	                             'Program'       => $data[5],
	            	                             'Enabled'       => $data[6],
	            	                             'LoanAdmin'     => $data[7],
	            	                             'Approver'      => $data[8],
	            	                             'Year'          => $data[9],
	            	                             'Notes'         => $data[10],
	            	                             'Password'      => $data[3]));
	        }

			if($this->db->affected_rows() > 0)
				return TRUE;
			else
				return FALSE;
		}

		public function check_userpasswords(){
			//This will select all users, to be used later to check if each user has a hashed password
			$this->db->select('StudentNumber, Password, LastName');
			$this->db->from('users');
			$this->db->where('Password = LastName');

			$query = $this->db->get();

			return $query->result_array();
		}

		public function update_password($studentNumber, $password){
			$this->db->where('StudentNumber', $studentNumber);
			$this->db->update('users', array('Password' => password_hash($password, PASSWORD_BCRYPT)));
		}

	}

?>