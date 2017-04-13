<?php include 'insertEquipmentClass.php'; ?>
<?php include 'equipmentDAO.php'; ?>
<?php require_once('equipmentDAO.php'); ?>
<?php
            $eqpDAO = new equipmentDAO();
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
				isset($_POST['Status'])||
				isset($_POST['AuthorizationRequired'])||
				isset($_POST['Year'])||
				isset($_POST['Cost'])||
				isset($_POST['DateInService'])||
				isset($_POST['EquipmentVisible'])||
				isset($_POST['EquipmentDeleted'])||
				isset($_POST['Notes'])||
				isset($_POST['Inventoried'])||
				isset($_POST['InventoriedDate'])||
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
				
				if($_POST['Quantity'] == ""){
                    $errorMessages['QuantityError'] = "Please enter the Quantity.";
                    $hasError = true;
                }
				
				if($_POST['EquipmentProgram'] == ""){
                    $errorMessages['EquipmentProgramError'] = "Please choose an EquipmentProgram.";
                    $hasError = true;
                }
				
				if($_POST['LoanDuration'] == ""){
                    $errorMessages['LoanDurationError'] = "Please enter the LoanDuration.";
                    $hasError = true;
                }
				
				if($_POST['Status'] == ""){
                    $errorMessages['StatusError'] = "Please enter the Status.";
                    $hasError = true;
                }
				
				if($_POST['AuthorizationRequired'] == ""){
                    $errorMessages['AuthorizationRequiredError'] = "Please indicate if AuthorizationRequired.";
                    $hasError = true;
                }
				
				if($_POST['Year'] == ""){
                    $errorMessages['YearError'] = "Please enter the Year.";
                    $hasError = true;
                }
				
				if($_POST['Cost'] == ""){
                    $errorMessages['CostError'] = "Please enter the Cost.";
                    $hasError = true;
                }
				
				if($_POST['DateInService'] == ""){
                    $errorMessages['DateInServiceError'] = "Please enter the DateInService.";
                    $hasError = true;
                }
				
				if($_POST['EquipmentVisible'] == ""){
                    $errorMessages['EquipmentVisibleError'] = "Please enter if EquipmentVisible.";
                    $hasError = true;
                }
				
				if($_POST['EquipmentDeleted'] == ""){
                    $errorMessages['EquipmentDeletedError'] = "Please enter if EquipmentDeleted.";
                    $hasError = true;
                }
				
				if($_POST['Notes'] == ""){
                    $errorMessages['NotesError'] = "Please enter Notes.";
                    $hasError = true;
                }
				
				if($_POST['Inventoried'] == ""){
                    $errorMessages['InventoriedError'] = "Please enter if Inventoried.";
                    $hasError = true;
                }
				
				if($_POST['InventoriedDate'] == ""){
                    $errorMessages['InventoriedDateError'] = "Please enter the InventoriedDate.";
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
					$Status        			= $_POST['Status'];
					$AuthorizationRequired  = $_POST['AuthorizationRequired'];
					$Year  					= $_POST['Year'];
					$Cost    				= $_POST['Cost'];
					$DateInService   		= $_POST['DateInService'];
					$EquipmentVisible    	= $_POST['EquipmentVisible'];
					$EquipmentDeleted       = $_POST['EquipmentDeleted'];
					$Notes     				= $_POST['Notes'];
					$Inventoried        	= $_POST['Inventoried'];
					$InventoriedDate       	= $_POST['InventoriedDate'];
					$ImagePath           	= $_POST['ImagePath'];
				
					$query = ("INSERT INTO Equipment (EquipmentTag, Name, SerialNo, Category, Quantity, EquipmentProgram,
					           LoanDuration, Status, AuthorizationReq, Year, Cost, DateInService, EquipmentVisible,
					           EquipmentDeleted, Notes, Inventoried, InventoriedDate, ImagePath) 
                               VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

					if($stmt = $eqpDAO->getMysqli()->prepare($query)){
						$stmt->bind_param("issiisississiisiss", 
								          $EquipmentTag,
								          $Name,
								          $SerialNumber,
								          $Category,
								          $Quantity,
								          $EquipmentProgram,
								          $LoanDuration,
								          $Status,
								          $AuthorizationRequired,
								          $Year,
								          $Cost,
								          $DateInService,
								          $EquipmentVisible,
								          $EquipmentDeleted,
								          $Notes,
								          $Inventoried,
								          $InventoriedDate,
										  $ImagePath);

						$stmt->execute();
						echo 'Equipment inserted successfully ';
					}
					else{
					    var_dump($eqpDAO->getMysqli()->error);
					}
					
				}
            }  
?>

<div id="content" class="clearfix">
                <div class="main">
                    <h1>Add Equipment</h1>
                    <p>Please fill out the following form with the equipment details.</p>
                    <form name="frmEquipment" id="frmEquipment" method="post" action="addEquipment.php" enctype="multipart/form-data">
                        <table>
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
                                <td>Status:</td>
                                <td><input type="text" name="Status" id="Status" size='40'>
								<?php 
									if(isset($errorMessages['StatusError'])){
									echo '<span style=\'color:red\'>' . $errorMessages['StatusError'] . '</span>';
								}
								?>
								</td>
						    </tr>
							<tr>
                                <td>Authorization Required:</td>
                                <td><input type="text" name="AuthorizationRequired" id="AuthorizationRequired" size='40'>
								<?php 
									if(isset($errorMessages['AuthorizationRequiredError'])){
									echo '<span style=\'color:red\'>' . $errorMessages['AuthorizationRequiredError'] . '</span>';
								}
								?>
								</td>
						    </tr>
							<tr>
                                <td>Year:</td>
                                <td><input type="text" name="Year" id="Year" size='40'>
								<?php 
									if(isset($errorMessages['YearError'])){
									echo '<span style=\'color:red\'>' . $errorMessages['YearError'] . '</span>';
								}
								?>
								</td>
						    </tr>
							<tr>
                                <td>Cost:</td>
                                <td><input type="text" name="Cost" id="Cost" size='40'>
								<?php 
									if(isset($errorMessages['CostError'])){
									echo '<span style=\'color:red\'>' . $errorMessages['CostError'] . '</span>';
								}
								?>
								</td>
						    </tr>
							<tr>
                                <td>Date In Service:</td>
                                <td><input type="text" name="DateInService" id="DateInService" size='40'>
								<?php 
									if(isset($errorMessages['DateInServiceError'])){
									echo '<span style=\'color:red\'>' . $errorMessages['DateInServiceError'] . '</span>';
								}
								?>
								</td>
						    </tr>
							<tr>
                                <td>Equipment Visible:</td>
                                <td><input type="text" name="EquipmentVisible" id="EquipmentVisible" size='40'>
								<?php 
									if(isset($errorMessages['EquipmentVisibleError'])){
									echo '<span style=\'color:red\'>' . $errorMessages['EquipmentVisibleError'] . '</span>';
								}
								?>
								</td>
						    </tr>
							<tr>
                                <td>Equipment Deleted:</td>
                                <td><input type="text" name="EquipmentDeleted" id="EquipmentDeleted" size='40'>
								<?php 
									if(isset($errorMessages['EquipmentDeletedError'])){
									echo '<span style=\'color:red\'>' . $errorMessages['EquipmentDeletedError'] . '</span>';
								}
								?>
								</td>
						    </tr>
							<tr>
                                <td>Notes:</td>
                                <td><input type="text" name="Notes" id="Notes" size='40'>
								<?php 
									if(isset($errorMessages['NotesError'])){
									echo '<span style=\'color:red\'>' . $errorMessages['NotesError'] . '</span>';
								}
								?>
								</td>
						    </tr>
							<tr>
                                <td>Inventoried:</td>
                                <td><input type="text" name="Inventoried" id="Inventoried" size='40'>
								<?php 
									if(isset($errorMessages['InventoriedError'])){
									echo '<span style=\'color:red\'>' . $errorMessages['InventoriedError'] . '</span>';
								}
								?>
								</td>
						    </tr>
							<tr>
                                <td>Inventoried Date:</td>
                                <td><input type="text" name="InventoriedDate" id="InventoriedDate" size='40'>
								<?php 
									if(isset($errorMessages['InventoriedDateError'])){
									echo '<span style=\'color:red\'>' . $errorMessages['InventoriedDateError'] . '</span>';
								}
								?>
								</td>
						    </tr>
							<tr>
                                <td>Image Path:</td>
                                <td><input type="text" name="ImagePath" id="ImagePath" size='40'>
								</td>
						    </tr>
                            <tr>
                                <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Add'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form"></td>
                            </tr>
                        </table>
                    </form>
                </div><!-- End Main -->
            </div><!-- End Content -->
