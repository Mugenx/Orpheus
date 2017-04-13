<?php
class deny_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function denyReservation($ReservationID, $DeniedReason){
			$updateParams = array(
				'Denied' => 1,
				'DeniedReason' => $DeniedReason
				);
			
			$this->db->where('ReservationID', $ReservationID);
			$this->db->update('reservations', $updateParams);	
			
			header('Location: reservations');
	}
}