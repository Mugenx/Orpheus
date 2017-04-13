<?php
$hasError = false;
$errorMessages = Array();

foreach($equipment as $result) {
	$resultEquipmentRecordID      	= $result['EquipmentRecordID'];
	$resultEquipmentTag   	    	= $result['EquipmentTag'];
	$resultName    			    	= $result['Name'];
	$resultSerialNumber   	    	= $result['SerialNo'];
	$resultCategory   		        = $result['Category'];
	$resultQuantity    		     	= $result['Quantity'];
	$resultEquipmentProgram         = $result['EquipmentProgram'];
	$resultLoanDuration			    = $result['LoanDuration'];
	$resultAuthorizationRequired    = $result['AuthorizationReq'];
	$resultEquipmentVisible    	    = $result['EquipmentVisible'];
	$resultNotes     				= $result['Notes'];
	$resultImagePath				= $result['ImagePath'];
}

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
		$Category   		   	= $_POST['Category'];
		$Quantity    			= $_POST['Quantity'];
		$EquipmentProgram       = $_POST['EquipmentProgram'];
		$LoanDuration			= $_POST['LoanDuration'];
		$Notes     				= $_POST['Notes'];
		$ImagePath           	= $_POST['ImagePath'];	
	}	
}
?>

<div class="container">
	<div class="col-lg-8 col-lg-offset-2">
		<h1><?php echo $title;?></h1>
		<p>Please edit the equipment information.</p>
<form name="frmEquipment" action="<?php echo base_url("editEquipment/update/$resultEquipmentRecordID") ?>" id="frmEquipment" method="post">
			<table class="table">
				<tr>
					<td>Equipment Tag:</td>
					<td><input type="text" name="EquipmentTag" id="EquipmentTag" size='40' value="<?php echo $resultEquipmentTag; ?>">
						<?php 
						if(isset($errorMessages['EquipmentTagError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['EquipmentTagError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="Name" id="Name" size='40' value="<?php echo $resultName; ?>">
						<?php 
						if(isset($errorMessages['NameError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['NameError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Serial Number:</td>
					<td><input type="text" name="SerialNumber" id="SerialNumber" size='40' value="<?php echo $resultSerialNumber; ?>" >
						
					</td>
				</tr>
				<tr>
					<td>Category:</td>
					<td><input type="text" name="Category" id="Category" size='40' value="<?php echo $resultCategory; ?>">
						<?php 
						if(isset($errorMessages['CategoryError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['CategoryError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Quantity:</td>
					<td><input type="text" name="Quantity" id="Quantity" size='40' value="<?php echo $resultQuantity; ?>">
						<?php 
						if(isset($errorMessages['QuantityError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['QuantityError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Equipment Program:</td>
					<td><input type="text" name="EquipmentProgram" id="EquipmentProgram" size='40' value="<?php echo $resultEquipmentProgram; ?>">
						<?php 
						if(isset($errorMessages['EquipmentProgramError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['EquipmentProgramError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Loan Duration:</td>
					<td><input type="text" name="LoanDuration" id="LoanDuration" size='40' value="<?php echo $resultLoanDuration; ?>">
						<?php 
						if(isset($errorMessages['LoanDurationError'])){
							echo '<span style=\'color:red\'>' . $errorMessages['LoanDurationError'] . '</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Authorization Required:</td>
					<td><input type="checkbox" name="AuthorizationRequired" id="AuthorizationRequired" size='40' 
						<?php
						if($resultAuthorizationRequired == 1){
							echo 'checked';
						}
						?>
						></td>
					</tr>
					<tr>
						<td>Equipment Visible:</td>
						<td><input type="checkbox" name="EquipmentVisible" id="EquipmentVisible" size='40' 
							<?php
							if($resultEquipmentVisible == 1){
								echo 'checked';
							}
							?>
							></td>
						</tr>
						<tr>
							<td>Notes:</td>
							<td><input type="text" name="Notes" id="Notes" size='40' value="<?php echo $resultNotes; ?>">
								
							</td>
						</tr>
						<tr>
							<td>Image Path:</td>
							<td><input type="text" name="ImagePath" id="ImagePath" size='40' value="<?php echo $resultImagePath; ?>">
							</td>
						</tr>
						<tr>
							<td colspan='2'><input type='submit' name='btnSubmit' class="btn btn-primary" id='submitEdit' value='Update'>&nbsp;&nbsp;<input type='reset' name="btnReset" class="btn btn-danger" id="btnReset" value="Reset Form"></td>
						</tr>
					</table>
				</form>
			</div><!-- End Main -->
</div><!-- End Container -->