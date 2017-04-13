<?php

require_once('DAO.php');
require_once('equipmentClass.php');

	
class equipmentDAO extends DAO {
		
	function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }
	
	public function getMysqli(){
		return $this->mysqli;
	}
	
	public function getEquipmentArray(){
        $result = $this->mysqli->query('SELECT * FROM EQUIPMENT');
		$equipmentArray = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                $equipment = new Equipment($row['EquipmentRecordID'], $row['EquipmentTag'], $row['Name'], $row['SerialNo'], (string)$row['Category'], $row['Quantity'], $row['EquipmentProgram'], $row['LoanDuration'], $row['Status'], $row['AuthorizationReq'], $row['Year'], $row['Cost'], $row['DateInService'], (string)$row['EquipmentVisible'], $row['EquipmentDeleted'], $row['Notes'], $row['Inventoried'], $row['InventoriedDate']);
                $equipmentArray[] = $equipment;
            }
            return $equipmentArray;
        }
        return false;
    }
	
	public function getEquipment($EquipmentTag){
        $query = 'SELECT * FROM EQUIPMENT WHERE EquipmentTag = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $EquipmentTag);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $temp = $result->fetch_assoc();
            $equipment = new Equipment($row['EquipmentRecordID'], $row['EquipmentTag'], $row['Name'], $row['SerialNo'], (string)$row['Category'], $row['Quantity'], $row['EquipmentProgram'], $row['LoanDuration'], $row['Status'], $row['AuthorizationReq'], $row['Year'], $row['Cost'], $row['DateInService'], (string)$row['EquipmentVisible'], $row['EquipmentDeleted'], $row['Notes'], $row['Inventoried'], $row['InventoriedDate']);
            $result->free();
            return $equipment;
        }
        $result->free();
        return false;
    }

    public function addEquipment($equipment){
       
		if(!$this->mysqli->connect_errno){
			$query = "INSERT INTO EQUIPMENT (EquipmentTag, Name, SerialNo, Category, Quantity, EquipmentProgram,
			LoanDuration, Status, AuthorizationReq, Year, Cost, DateInService, EquipmentVisible,
			EquipmentDeleted, Notes, Inventoried, InventoriedDate) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->mysqli->prepare($query);
			if($stmt = $this->mysqli->prepare($query)){
				$stmt->bind_param('issiisississsssss', 
					$equipment->getEquipmentTag(),
					$equipment->getName(), 
                    $equipment->getSerialNumber(),
					$equipment->getCategory(),
					$equipment->getQuantity(), 
                    $equipment->getEquipmentProgram(),
					$equipment->getLoanDuration(), 
					$equipment->getStatus(),
					$equipment->getAuthorizationRequired(),
                    $equipment->getYear(),
                    $equipment->getCost(),
					$equipment->getDateInService(),
					$equipment->getEquipmentVisible(),
					$equipment->getEquipmentDeleted(),
					$equipment->getNotes(),
					$equipment->getInventoried(),
					$equipment->getInventoriedDate());
				$stmt->execute();
				return 'Equipment has been added successfully!';
			}
            else {
                return $this->mysqli->error;
            }
        } else {
            return 'Could not connect to Database.';
        }
    }
}
?>