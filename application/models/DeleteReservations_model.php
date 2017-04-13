<?php

	class DeleteReservations_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}

		public function delete_equipment($reservationID){
			
			$this->db->delete('reservations', array("ReservationID" => $reservationID));
		}

	}

?>