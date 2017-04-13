<?php
class addEquipment_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}
	
	public function insert_equipment($params){
			
			$insertParams = array(
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
			
			$this->db->insert('equipment', $insertParams);
	}

}