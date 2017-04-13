<?php

class CurrentUser_model extends CI_Model {
	
	public function __construct(){

		$this->load->database();
	}

	public function get_userinfo($studentNumber){

		$this->db->select('ProgramName, StudentNumber, UserName, FirstName, LastName, Email, Program, Year, Notes');
		$this->db->from('users, programs');
		$this->db->where('StudentNumber', $studentNumber);
		$this->db->where('ProgramID = Program');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_loaninfo($studentNumber){

		$this->db->select('e.Name, e.EquipmentTag, l.StudentNumber, l.DueDate');
		$this->db->from('equipment e');
		$this->db->join('loanedout l', 'e.EquipmentRecordID = l.EquipmentRecordID');
		$this->db->where("l.StudentNumber = '$studentNumber'");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_reserveinfo($studentNumber){
		
		$this->db->select('e.Name, ReserveStart, ReserveEnd, Approved, Denied, DeniedReason, ReservationID');
		$this->db->from('equipment e');
		$this->db->join('reservations r', 'r.EquipmentRecordID = e.EquipmentRecordID');
		$this->db->where("r.StudentNumber = '$studentNumber'");
		$query = $this->db->get();
		return $query->result_array();
	}

}

?>