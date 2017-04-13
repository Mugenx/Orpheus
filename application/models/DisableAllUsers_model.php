<?php

	class DisableAllUsers_model extends CI_Model {
		
		public function __construct(){

			$this->load->database();
		}

		public function disableusers(){
            
            $this->db->where('LoanAdmin', 0);
			$this->db->update('users', array('Enabled'=>0));
		}
	}

?>