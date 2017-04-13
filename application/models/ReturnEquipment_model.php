<?php
class returnEquipment_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function return_equipment($LoanedOutID, $EquipmentRecordID, $StudentNumber, 
									 $LoanedDate, $ReturnedDate){
			
			$updateParams = array(
				'EquipmentVisible' => 1);
			
			$this->db->where('EquipmentRecordID', $EquipmentRecordID);
			$this->db->update('equipment', $updateParams);	
			
			$this->db->where('EquipmentRecordID', $EquipmentRecordID);
			$this->db->set('quantity', 'quantity+1', FALSE);
			$this->db->update('equipment');
			
			$this->db->where('LoanedOutID', $LoanedOutID);
			$this->db->delete('loanedout');
			
			$insertParams = array(
				'EquipmentRecordID' => $EquipmentRecordID,
				'StudentNumber' => $StudentNumber,
				'LoanedDate' => $LoanedDate,
				'ReturnedDate' => $ReturnedDate
			);
			
			$this->db->insert('loanhistory', $insertParams);
			header('Location: returns');
	}
}