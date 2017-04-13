<?php
class editEquipment_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_equipmentByID($equipmentID){
		$this->db->where('EquipmentRecordID', $equipmentID);
		$this->db->from('equipment');
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	public function update_equipment($params, $equipmentID){
		$updateParams = array(
			'EquipmentTag' => $params['EquipmentTag'],
			'Name' => $params['Name'],
			'SerialNo' => $params['SerialNumber'],
			'Category' => $params['Category'],
			'Quantity' => $params['Quantity'],
			'EquipmentProgram' => $params['EquipmentProgram'],
			'LoanDuration' => $params['LoanDuration'],
			'AuthorizationReq' => $params['AuthorizationRequired'],
			'EquipmentVisible' => $params['EquipmentVisible'],
			'Notes' => $params['Notes'],
			'ImagePath' => $params['ImagePath']
			);
		
		$this->db->where('EquipmentRecordID', $equipmentID);
		$this->db->update('equipment', $updateParams);	

	}
}