<?php
require_once('db/abstractDAO.php');
require_once('model/equipment.php');
require_once('model/users.php');

class Controller extends abstractDAO{


	function __construct() {

        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }



    public function getEquipment(){

				$results_per_page = 50;
        //The query method returns a mysqli_result object
				if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
				$start_from = ($page-1) * $results_per_page;

				// $sql = "SELECT * FROM equipment LIMIT". $start_from . "," .$results_per_page;
				// $sql = 'SELECT * FROM equipment LIMIT'. $start_from .','.$results_per_page ;
				// $result = $this->mysqli->query($sql);

        $result = $this->mysqli->query('SELECT * FROM equipment LIMIT 0,50');
        $equipments = Array();

        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new employee object, and add it to the array.
                $equipment = new Equipment(
                    $row['EquipmentRecordID'],
                    $row['EquipmentTag'],
                    $row['Name'],
                    $row['ShortName'],
                    $row['SerialNo'],
                    $row['AlgCode'],
                    $row['Category'],
                    $row['Quantity'],
                    $row['EquipmentProgram'],
                    $row['LoanDuration'],
                    $row['Status'],
                    $row['AuthorizationReq'],
                    $row['EquipmentVisible'],
                    $row['Cost'],
                    $row['DateInService'],
                    $row['ImageName'],
                    $row['HideWhen'],
                    $row['Inventoried'],
                    $row['InventoriedDate'],
                    $row['Invid'],
                    $row['SSMA_TimeStamp']
                    );
                $equipments[] = $equipment;
            }
            $result->free();
            return $equipments;
        }
        $result->free();
        return false;
    }

		public function getCategory(){
			$result = $this->mysqli->query('SELECT * FROM equipment LIMIT 0,50');
			$equipments = Array();

			if($result->num_rows >= 1){
					while($row = $result->fetch_assoc()){
							//Create a new employee object, and add it to the array.
							$equipment = new Equipment(
									$row['EquipmentRecordID'],
									$row['EquipmentTag'],
									$row['Name'],
									$row['ShortName'],
									$row['SerialNo'],
									$row['AlgCode'],
									$row['Category'],
									$row['Quantity'],
									$row['EquipmentProgram'],
									$row['LoanDuration'],
									$row['Status'],
									$row['AuthorizationReq'],
									$row['EquipmentVisible'],
									$row['Cost'],
									$row['DateInService'],
									$row['ImageName'],
									$row['HideWhen'],
									$row['Inventoried'],
									$row['InventoriedDate'],
									$row['Invid'],
									$row['SSMA_TimeStamp']
									);
							$equipments[] = $equipment;
					}
					$result->free();
					return $equipments;
			}
			$result->free();
			return false;
	}

		public function getCurrentUser(){

        $result = $this->mysqli->query('SELECT DISTINCT * FROM tusers WHERE studentNo = 040000000');

        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new employee object, and add it to the array.
                $user = new User(
                    $row['userID'],
                    $row['userName'],
                    $row['studentNo'],
                    $row['firstName'],
                    $row['lastName'],
                    $row['email'],
                    $row['program'],
                    $row['year'],
                    $row['notes']
                    );
            }
            $result->free();
            return $user;
        }
        $result->free();
        return false;
    }

}
?>
