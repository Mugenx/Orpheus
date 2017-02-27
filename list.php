<?php include 'header.php'; ?>
<?php require_once('controller/controller.php'); ?>

<div class="equitable" align="center">
  <?php
  try{
    $modelDAO = new Controller();
    $equipments = $modelDAO->getEquipment();
    if($equipments){
      //We only want to output the table if we have customer.
      //If there are none, this code will not run.
      echo '<table class="table table-responsive table-striped table-hover"
      align="center">';
      echo '
      <thead>
      <tr>
      <th>EuipmentRecordID</th>
      <th>EquipmentTag</th>
      <th>Name</th>
      <th>ShortName</th>
      <th>Category</th>
      <th>Quantity</th>
      <th>EquipmentProgram</th>
      <th>LoanDuration</th>
      <th>Status</th>
      <th>AuthorizationReq</th>
      <th>EquipmentVisible</th>
      <th>Cost</th>
      <th>InventoriedDate</th>
      </tr>
      </thead>';
      foreach($equipments as $equipment){
        echo '<tr>';
        echo '<td>' . $equipment->getEuipmentRecordID() . '</td>';
        echo '<td>' . $equipment->getEquipmentTag() . '</td>';
        echo '<td>' . $equipment->getName() . '</td>';
        echo '<td>' . $equipment->getShortName() . '</td>';
        // echo '<td>' . $equipment->getSerialNo() . '</td>';
        // echo '<td>' . $equipment->getAlgCode() . '</td>';
        echo '<td>' . $equipment->getCategory() . '</td>';
        echo '<td>' . $equipment->getQuantity() . '</td>';
        echo '<td>' . $equipment->getEquipmentProgram() . '</td>';
        echo '<td>' . $equipment->getLoanDuration() . '</td>';
        echo '<td>' . $equipment->getStatus() . '</td>';
        echo '<td>' . $equipment->getAuthorizationReq() . '</td>';
        echo '<td>' . $equipment->getEquipmentVisible() . '</td>';
        echo '<td>' . $equipment->getCost() . '</td>';
        // echo '<td>' . $equipment->getDateInService() . '</td>';
        // echo '<td>' . $equipment->getImageName() . '</td>';
        // echo '<td>' . $equipment->getHideWhen() . '</td>';
        // echo '<td>' . $equipment->getInventoried() . '</td>';
        echo '<td>' . $equipment->getInventoriedDate() . '</td>';
        // echo '<td>' . $equipment->getInvid() . '</td>';
        // echo '<td>' . $equipment->getSSMA_TimeStamp() . '</td>';
        echo '</tr>';
      }
      echo '</table>';
    }

  }catch(Exception $e){
    //If there were any database connection/sql issues,
    //an error message will be displayed to the user.
    echo '<h3>Error on page.</h3>';
    echo '<p>' . $e->getMessage() . '</p>';
  }

  ?>

    <ul class="pagination">
    				<li>
    					<a href="#">Prev</a>
    				</li>
    				<li>
    					<a href="list.php?page=1">1</a>
    				</li>
    				<li>
    					<a href="list.php?page=2">2</a>
    				</li>
    				<li>
    					<a href="list.php?page=3">3</a>
    				</li>
    				<li>
    					<a href="list.php?page=4">4</a>
    				</li>
    				<li>
    					<a href="list.php?page=5">5</a>
    				</li>
    				<li>
    					<a href="#">Next</a>
    				</li>
    			</ul>

</div>
<?php include 'footer.php'; ?>
