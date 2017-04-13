<?php
$hasError = false;
$errorMessages = Array();

if( isset($_POST['EquipmentRecordID']) ||
	isset($_POST['EquipmentTag']) || 
	isset($_POST['Name']) ||
	isset($_POST['SerialNumber']) ||
	isset($_POST['Category']) ||
	isset($_POST['Quantity']) ||
	isset($_POST['EquipmentProgram'])||
	isset($_POST['LoanDuration'])||
	isset($_POST['AuthorizationRequired'])||
	isset($_POST['EquipmentVisible'])||
	isset($_POST['Notes'])||
	isset($_POST['ImagePath'])){

	if(!is_numeric($_POST['EquipmentTag']) || $_POST['EquipmentTag'] == ""){
		$errorMessages['EquipmentTagError'] = "Please enter an EquipmentTag.";
		$hasError = true;
	}

	if($_POST['Name'] == ""){
		$errorMessages['NameError'] = "Please enter a Name.";
		$hasError = true;
	}

	if($_POST['SerialNumber'] == ""){
		$errorMessages['SerialNumberError'] = "Please enter a SerialNumber.";
		$hasError = true;
	}

	if($_POST['Category'] == ""){
		$errorMessages['CategoryError'] = "Please enter a Category.";
		$hasError = true;
	}

	if(!is_numeric($_POST['Quantity']) || $_POST['Quantity'] == ""){
		$errorMessages['QuantityError'] = "Please enter the Quantity.";
		$hasError = true;
	}

	if($_POST['EquipmentProgram'] == ""){
		$errorMessages['EquipmentProgramError'] = "Please enter an EquipmentProgram.";
		$hasError = true;
	}

	if(!is_numeric($_POST['LoanDuration']) || $_POST['LoanDuration'] == ""){
		$errorMessages['LoanDurationError'] = "Please enter the LoanDuration.";
		$hasError = true;
	}

	if(!$hasError){

		$EquipmentTag   		= $_POST['EquipmentTag'];
		$Name    				= $_POST['Name'];
		$SerialNumber   		= $_POST['SerialNumber'];
		$Category   		    = $_POST['Category'];
		$Quantity    			= $_POST['Quantity'];
		$EquipmentProgram       = $_POST['EquipmentProgram'];
		$LoanDuration			= $_POST['LoanDuration'];
		$Notes     				= $_POST['Notes'];
		$ImagePath       		= $_POST['ImagePath'];		
	}
}  
?>

<div class="container">
<div class="col-lg-8 col-lg-offset-2">
		<h1><?php echo $title; ?></h1>
		<p>Please fill out the following form with the equipment details.</p>
		<form name="frmEquipment" id="frmEquipment" method="post" action="addEquip" enctype="multipart/form-data">
			<table class="table table-responsive ">
				<tr>
					<td>Equipment Tag:</td>
					<td><input type="text" name="EquipmentTag" id="EquipmentTag" size='40'>
						<?php 
						if(isset($errorMessages['EquipmentTagError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['EquipmentTagError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="Name" id="Name" size='40'>
						<?php 
						if(isset($errorMessages['NameError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['NameError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Serial Number:</td>
					<td><input type="text" name="SerialNumber" id="SerialNumber" size='40'>
						<?php 
						if(isset($errorMessages['SerialNumberError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['SerialNumberError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Category:</td>
					<td><input type="text" name="Category" id="Category" size='40'>
						<?php 
						if(isset($errorMessages['CategoryError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['CategoryError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Quantity:</td>
					<td><input type="text" name="Quantity" id="Quantity" size='40'>
						<?php 
						if(isset($errorMessages['QuantityError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['QuantityError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Equipment Program:</td>
					<td><input type="text" name="EquipmentProgram" id="EquipmentProgram" size='40'>
						<?php 
						if(isset($errorMessages['EquipmentProgramError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['EquipmentProgramError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Loan Duration:</td>
					<td><input type="text" name="LoanDuration" id="LoanDuration" size='40'>
						<?php 
						if(isset($errorMessages['LoanDurationError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['LoanDurationError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Authorization Required:</td>
					<td><input type="checkbox" name="AuthorizationRequired" id="AuthorizationRequired">
					</td>
				</tr>
				<tr>
					<td>Equipment Visible:</td>
					<td><input type="checkbox" name="EquipmentVisible" id="EquipmentVisible" size='40'>
					</td>
				</tr>
				<tr>
					<td>Notes:</td>
					<td><input type="text" name="Notes" id="Notes" size='40'>
					</td>
				</tr>
				<tr>
					<td>Image Path:</td>
					<td><input type="text" name="ImagePath" id="ImagePath" size='40'>
					</td>
				</tr>
				<tr>
					<td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' class="btn btn-primary" value='Add'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" class="btn btn-danger" style="height:50px" value="Reset Form"></td>
				</tr>
			</table>
		</form>
	</div><!-- End Main -->
</div><!-- End Container -->
