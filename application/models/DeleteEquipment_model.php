<?php
class deleteEquipment_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function delete_equipment($EquipmentID){
		$this->db->where('EquipmentRecordID', $EquipmentID);
		$this->db->delete('equipment');
		header("Location: ". base_url('equiplist'));
	}
}