<?php

	class EditReservations_model extends CI_Model {
		
		public function __construct(){

			$this->load->database();
		}

		public function get_equipmentRecordID($reservationID){
			$this->db->select('EquipmentRecordID');
			$this->db->from('reservations');
			$this->db->where('ReservationID', $reservationID);

			$query = $this->db->get();

			$return = $query->row();

			return $return->EquipmentRecordID;
		}

		public function check_reservations($equipmentRecordID, $date){
			$this->db->select('ReservationID');
			$this->db->from('reservations');
			$this->db->where('EquipmentRecordID', $equipmentRecordID);
			$this->db->where('ReserveStart', $date);
			$this->db->where('Denied = 0');

			$query = $this->db->get();
            
            if($query->num_rows() == 0)
            	return TRUE;
            else
            	return FALSE;
		}

		public function get_reservationinfo($reservationID){
			$this->db->select('Name');
			$this->db->from('equipment e');
			$this->db->join('reservations r', 'e.EquipmentRecordID = r.EquipmentRecordID');
			$this->db->where('ReservationID', $reservationID);

			$query = $this->db->get();

			return $query->result_array();
		}

		public function update_reservation($newDate, $newReserveEnd, $newApproved, $newDenied, $newDeniedReason, $reservationID){

			$this->db->where('ReservationID', $reservationID);

            $this->db->update('reservations', array('ReserveStart' =>$newDate, 
				                                    'ReserveEnd'   =>$newReserveEnd,
				                                    'Approved'     =>$newApproved,
				                                    'Denied'       =>$newDenied,
				                                    'DeniedReason' =>$newDeniedReason));

            if($this->db->affected_rows() > 0)
				return TRUE;
			else
				return FALSE;
		}
	}

?>