<?php
class approve_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function approveReservation($ReservationID, $EquipmentRecordID, $StudentNumber,
		$ReserveStart, $ReserveEnd){
		$updateParams = array(
			'EquipmentVisible' => 0);
		
		$this->db->where('EquipmentRecordID', $EquipmentRecordID);
		$this->db->update('equipment', $updateParams);	
		
		$this->db->where('ReservationID', $ReservationID);
		$this->db->delete('reservations');
		
		$insertParams = array(
			'EquipmentRecordID' => $EquipmentRecordID,
			'StudentNumber' => $StudentNumber,
			'LoanedDate' => $ReserveStart,
			'DueDate' => $ReserveEnd
			);
		
		$this->db->insert('loanedout', $insertParams);
		header('Location: reservations');
	}
}