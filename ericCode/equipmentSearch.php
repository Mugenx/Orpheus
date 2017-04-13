<?php require_once('equipmentDAO.php'); ?>
<div id="content" class="clearfix">
<h1> Search Equipment </h1>

<?php 
	error_reporting(E_ALL ^ E_WARNING); 
	
	global $search_result;

	if(isset($_POST['search'])){
		$searchValue =$_POST['searchValue'];
		$searchCriteria = $_POST['fields'];
		$query = "SELECT * FROM EQUIPMENT WHERE " .$searchCriteria. " LIKE '%".$searchValue."%'";
		$search_result=filter($query);
	}
	
	function filter($query){
		$eqpDAO = new equipmentDAO();
		$connection = $eqpDAO->getMysqli();
		$result=mysqli_query($connection, $query);
		return $result;
	}
?>

<html>
		<body>
			<form action="equipmentSearch.php" method="post">
				<input type="text" name="searchValue" size ="50" placeholder="Enter the name of the equipment you would like to search for">
				<select id="criteria" name="fields">
					<option value="EquipmentRecordID">EquipmentRecordID</option>
					<option value="EquipmentTag">EquipmentTag</option>
					<option value="Name">Name</option>
					<option value="SerialNo">SerialNo</option>
					<option value="Category">Category</option>
					<option value="Quantity">Quantity</option>
					<option value="EquipmentProgram">EquipmentProgram</option>
					<option value="LoanDuration">LoanDuration</option>
					<option value="Status">Status</option>
					<option value="AuthorizationRequired">AuthorizationRequired</option>
					<option value="Year">Year</option>
					<option value="Cost">Cost</option>
					<option value="DateInService">DateInService</option>
					<option value="EquipmentVisible">EquipmentVisible</option>
					<option value="EquipmentDeleted">EquipmentDeleted</option>
					<option value="Notes">Notes</option>
					<option value="Inventoried">Inventoried</option>
					<option value="InventoriedDate">InventoriedDate</option>
					<option value="ImagePath">ImagePath</option>
				</select><br><br>
				<input type="submit" name="search" value="Search"><br><br>
			
				<table border=\'1\'>
					<tr>
						<th>Edit</th>
						<th>EquipmentRecordID</th>
						<th>EquipmentTag</th>
						<th>Name</th>
						<th>SerialNo</th>
						<th>Category</th>
						<th>Quantity</th>
						<th>EquipmentProgram</th>
						<th>LoanDuration</th>
						<th>Status</th>
						<th>AuthorizationRequired</th>
						<th>Year</th>
						<th>Cost</th>
						<th>DateInService</th>
						<th>EquipmentVisible</th>
						<th>EquipmentDeleted</th>
						<th>Notes</th>
						<th>Inventoried</th>
						<th>InventoriedDate</th>
						<th>ImagePath</th>
					</tr>
				
					<?php 					
					
					while ($row=mysqli_fetch_array($search_result, MYSQLI_ASSOC)): ?>
					<?php $eqpID = $row['EquipmentRecordID'];?>
					<tr>
						<td><form name="edit" action="editEquipment.php" method="GET">
						<input type="hidden" name="eqpID" value="<?php echo $eqpID; ?>">
						<input type="submit" name="editEqp" value="Edit">
						</form></td>
						<td><?php echo $row['EquipmentRecordID'];?></td>
						<td><?php echo $row['EquipmentTag'];?></td>
						<td><?php echo $row['Name'];?></td>
						<td><?php echo $row['SerialNo'];?></td>
						<td><?php echo $row['Category'];?></td>
						<td><?php echo $row['Quantity'];?></td>
						<td><?php echo $row['EquipmentProgram'];?></td>
						<td><?php echo $row['LoanDuration'];?></td>
						<td><?php echo $row['Status'];?></td>
						<td><?php echo $row['AuthorizationReq'];?></td>
						<td><?php echo $row['Year'];?></td>
						<td><?php echo $row['Cost'];?></td>
						<td><?php echo $row['DateInService'];?></td>
						<td><?php echo $row['EquipmentVisible'];?></td>
						<td><?php echo $row['EquipmentDeleted'];?></td>
						<td><?php echo $row['Notes'];?></td>
						<td><?php echo $row['Inventoried'];?></td>
						<td><?php echo $row['InventoriedDate'];?></td>
						<td><?php echo $row['ImagePath'];?></td>
					</tr>
					<?php endwhile;?>
				</table>
			</form>
		</body>
</html>