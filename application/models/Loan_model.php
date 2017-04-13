<?php
class loan_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		return $this;
	}

	public function get_equipmentProgram()
	{
		$this->db->distinct();
		$this->db->select('EquipmentProgram');
		$query = $this->db->get('equipment');
		return $query->result_array();
	}

	public function get_equipmentName($equipmentProgram)
	{
		$this->db->select('Name');
		$this->db->select('ImagePath');
		$this->db->where('EquipmentVisible',1);
		$this->db->where('EquipmentProgram', $equipmentProgram); 
		$query = $this->db->get('equipment');
		return $query->result_array();
	}

	public function insert($itemName, $StudentNumber, $startDate, $endDate ){
		$EquipmentRecordID = $this->get_EquipmentRecordID($itemName);
		$this->db->flush_cache();
		$data = array(
			'EquipmentRecordID' => $EquipmentRecordID,
			'StudentNumber' => $StudentNumber,
			'SubmitDate' => date('Ymd'),
			'ReserveStart' => $startDate,
			'ReserveEnd' => $endDate
			);
		$this->db->insert('reservations', $data);
	}

	public function get_EquipmentRecordID($itemName){
		$this->db->select('EquipmentRecordID');
		$this->db->where('Name', $itemName);
		$query = $this->db->get('equipment');
		$ret = $query->row();
		return $ret->EquipmentRecordID;
	}

	public function get_request($id){
		$this->db->where('ReservationID', $id); 
		$query = $this->db->get('reservations');
		return $query->result_array();
	}

	public function get_requests($StudentNumber){
		$this->db->where('StudentNumber', $StudentNumber); 
		$query = $this->db->get('reservations');
		return $query->result_array();
	}

	public function get_name($id){
		$this->db->where('EquipmentRecordID', $id); 
		$query = $this->db->get('equipment');
		$ret = $query->row();
		return $ret->Name;
	}

	public function delete($id){
		$this->db->where('ReservationID', $id);
		// $this->db->where('SubmitDate', date('Ymd'));
		$this->db->delete('reservations');
	}

	public function update($rid, $startDate, $endDate){
		$fields = array(
			'ReserveStart' => $startDate,
			'ReserveEnd' => $endDate,
			'SubmitDate' => date('Ymd')
			);
		$this->db->where('ReservationID', $rid);
		$this->db->update('reservations', $fields);
	}
}
