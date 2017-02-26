<?php
require_once('abstractDAO.php');
require_once('equipment.php');

class modelDAO extends abstractDAO{


	function __construct() {

        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }

    public function getEquipment(){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM equipment');
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

}
?>
