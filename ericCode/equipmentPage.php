<?php require_once('equipmentDAO.php'); ?>
<div id="content" class="clearfix">
<h1> Equipment </h1>
<button onclick="window.location.href='addEquipment.php'">Add Equipment</a></button> 
<?php

	   $eqpDAO = new equipmentDAO();
	   $equipmentArray = $eqpDAO->getEquipmentArray();
            if($equipmentArray){
                echo '<table border=\'1\'>';
                echo '<tr><th><a href="equipmentDAO.php?sort=EquipmentRecordID">EquipmentRecordID</a></th><th><a href="equipmentDAO.php?sort=Equipment Tag">Equipment Tag</a></th><th><a href="equipmentDAO.php?sort=Name">Name</a></th><th><a href="equipmentDAO.php?sort=SerialNo">SerialNo</a></th><th><a href="equipmentDAO.php?sort=Category">Category</a></th><th><a href="equipmentDAO.php?sort=Quantity">Quantity</a></th><th><a href="equipmentDAO.php?sort=EquipmentProgram">Equipment Program</a></th><th><a href="equipmentDAO.php?sort=LoanDuration">Loan Duration</a></th><th><a href="equipmentDAO.php?sort=Status">Status</a></th><th><a href="equipmentDAO.php?sort=AuthorizationReq">Authorization Required</a></th><th><a href="equipmentDAO.php?sort=Year">Year</a></th><th><a href="equipmentDAO.php?sort=Cost">Cost</a></th><th><a href="equipmentDAO.php?sort=DateInService">Date In Service</a></th><th><a href="equipmentDAO.php?sort=EquipmentVisible">Equipment Visible</a></th><th><a href="equipmentDAO.php?sort=EquipmentDeleted">Equipment Deleted</a></th><th><a href="equipmentDAO.php?sort=Notes">Notes</a></th><th><a href="equipmentDAO.php?sort=Inventoried">Inventoried</a></th><th><a href="equipmentDAO.php?sort=InventoriedDate">InventoriedDate</a></tr>';
                foreach($equipmentArray as $equipment){
                    echo '<tr>';
                    echo '<td>' . $equipment->getEquipmentRecordID() . '</td>';
                    echo '<td>' . $equipment->getEquipmentTag() . '</td>';
                    echo '<td>' . $equipment->getName() . '</td>';
					echo '<td>' . $equipment->getSerialNumber() . '</td>';
					echo '<td>' . $equipment->getCategory() . '</td>';	
					echo '<td>' . $equipment->getQuantity() . '</td>';	
					echo '<td>' . $equipment->getEquipmentProgram() . '</td>';	
					echo '<td>' . $equipment->getLoanDuration() . '</td>';	
					echo '<td>' . $equipment->getStatus() . '</td>';	
					echo '<td>' . $equipment->getAuthorizationRequired() . '</td>';		
					echo '<td>' . $equipment->getYear() . '</td>';
					echo '<td>' . $equipment->getCost() . '</td>';
					echo '<td>' . $equipment->getDateInService() . '</td>';
					echo '<td>' . $equipment->getEquipmentVisible() . '</td>';
					echo '<td>' . $equipment->getEquipmentDeleted() . '</td>';
					echo '<td>' . $equipment->getNotes() . '</td>';
					echo '<td>' . $equipment->getInventoried() . '</td>';
					echo '<td>' . $equipment->getInventoriedDate() . '</td>';
					echo '</tr>';
                }
				echo' </table>';
            }
			
		
?>
</div><!-- End Content -->
<?php //include 'footer.php'; ?>
