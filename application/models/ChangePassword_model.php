<?php

	class ChangePassword_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_password($studentNumber){
			
			$this->db->select('Password');
			$this->db->from('users');
			$this->db->where('StudentNumber', $studentNumber);
 
            $query = $this->db->get();

            $return = $query->row();

            return $return->Password;
		}

		public function update_password($password, $studentNumber){
			$this->db->where('StudentNumber', $studentNumber);
			$this->db->update('users', array('Password' => password_hash($password, PASSWORD_BCRYPT)));

			if($this->db->affected_rows() > 0)
				return TRUE;
			else
				return FALSE;
		}

	}

?>