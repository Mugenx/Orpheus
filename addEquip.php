<?php include'header.php' ?>

<div class="container">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <h1>Add Equipment</h1>
    <p>Please fill out the following form with the equipment details.</p>
    <form name="frmEquipment" id="frmEquipment" method="post" action="addEquipment.php" enctype="multipart/form-data">
      <table class="table table-responsive">
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
        <!-- <tr>
          <td class="btn btn-primary" colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Add'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form"></td>
        </tr> -->
      </table>
      <button type="button" class="btn btn-primary" style="width:100%" name="Add Equipment">Add Equipment</button><br><br>
      <button type="button" class="btn btn-primary" st style="width:100%; background-color: #FF5A5F; border-color: #FF5A5F" name="reset">RESET</button>
    </form>
  </div>
  <div class="col-lg-2"></div>
  </div><!-- End Main -->

</div>
<?php include'footer.php' ?>
