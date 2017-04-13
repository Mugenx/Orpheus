<?php

        //---------------------INITIALIZE FIELDS----------------------//
$studentNumber = NULL;
$userName      = NULL;
$firstName     = NULL;
$lastName      = NULL;
$email         = NULL;
$program       = NULL;
$year          = NULL;
$enabled       = NULL;
$loanAdmin     = NULL;
$approver      = NULL;
$notes         = NULL;
        //------------------------------------------------------------//

        //--------------------------GET STUDENT INFO FROM DATABASE-------------------------//
if(isset($_GET['StudentNumber'])){

    $studentNumber = $_GET['StudentNumber'];

    foreach($userinfo as $row){
        $userName  = $row['UserName'];
        $firstName = $row['FirstName'];
        $lastName  = $row['LastName'];
        $email     = $row['Email'];
        $program   = $row['ProgramName'];
        $enabled   = $row['Enabled'];
        $loanAdmin = $row['LoanAdmin'];
        $approver  = $row['Approver'];
        $year      = $row['Year'];
        $notes     = $row['Notes'];
    }
}
        //--------------------------------------------------------------------------------//
?>


<div class="container">

    <h1><?php echo $title ?></h1>
    <div class="col-lg-12">
        <h3>Student Information</h3>

        <!- ===================== Main Student Info ==================== ->
        <div id="info" class="col-lg-6">
            <table class="table">
                <tr>
                    <td><label>Student No:</label></td>
                    <td><?php echo $studentNumber; ?></td>
                </tr>



                <tr>
                    <td><label>Username:</label></td>
                    <td><?php echo $userName; ?></td>
                </tr>



                <tr>
                    <td><label>First Name:</label></td>
                    <td><?php echo $firstName; ?></td>
                </tr>



                <tr>
                    <td><label>Last Name:</label></td>
                    <td><?php echo $lastName; ?></td>
                </tr>



                <tr>
                    <td><label>Email:</label></td>
                    <td><?php echo $email; ?></td>
                </tr>



                <tr>
                    <td><label>Program:</label></td>
                    <td><?php echo $program?></td>
                </tr>



                <tr>
                    <td><label>Year:</label></td>
                    <td><?php echo $year?></td>
                </tr>



                <tr>
                    <td><label>Enabled:</label></td>
                    <td><?php
                    //If user is enabled
                        if($enabled == 1){
                            echo 'Yes';
                        }
                    //If user is not enabled
                        else if($enabled == 0){
                            echo'No';
                        }
                        ?></td>
                    </tr>




                    <label>Loan Admin:</label>
                    <?php
                    //If user is a loan admin
                    if($loanAdmin == 1){
                        echo 'Yes';
                    }
                    //If user is not a loan admin
                    else if($loanAdmin == 0){
                        echo'No';
                    }
                    ?>



                    <tr>
                        <td><label>Approver:</label></td>
                        <td><?php
                    //If user is an approver
                            if($approver == 1){
                                echo 'Yes';
                            }
                    //If user is not an approver
                            else if($approver == 0){
                                echo'No';
                            }
                            ?></td>
                        </tr>





                        <tr>
                            <td><label>Notes:</label></td>
                            <td><textarea id="notes" name="notes" class="studinfo" rows="5" cols="30"><?php echo $notes; ?></textarea></td>
                        </tr>
                    </table>

                </div>
                <!- ============================================================ ->

                <!- ======================== Loan Table ======================== ->
                <div id="loans" class="col-lg-12">
                    <h3>Items on Loan</h3>
                    <table class="table table-hover table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Tag</th>
                                <th>Name</th>
                                <th>Due Date</th>
                            </tr>
                        </thead>
                        <!-Data of student's loaned equipment will go here->
                        <?php
                //--------------------------GET STUDENTS LOAN INFO FROM DATABASE-------------------------//
                        foreach($loaninfo as $row){
                            echo "<tr>
                            <td>".$row["EquipmentTag"]."</td>
                            <td>".$row["Name"]        ."</td>
                            <td>".$row["DueDate"]     ."</td>
                        </tr>";
                    }   
                //---------------------------------------------------------------------------------------//
                    ?>
                </table>
            </div>
            <!- ============================================================ ->

            <!- ===================== Reservation Table ==================== ->
            <div id="reservations" class="col-lg-12">
                <h3>Reservations</h3>
                <table id="list" class="table table-hover table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Reserve Start</th>
                            <th>Reserve End</th>
                            <th>Status</th><!-Approved/denied/pending->
                            <th>Reason for Denial</th><!-Will have a reason only if reservation has been denied->
                        </tr>
                    </thead>
                    <?php
                //--------------------------GET STUDENTS RESERVATION INFO FROM DATABASE-------------------------//
                    foreach($reserveinfo as $row){
                        echo "<tr>";
                        echo "<td>".$row["Name"]."</td>";
                        echo "<td>".$row["ReserveStart"]."</td>";
                        echo "<td>".$row["ReserveEnd"]  ."</td>";
                        echo "<td>";
                        if($row["Approved"] == 1){
                            //If reservation is approved
                            echo  "Approved </td><td> N/A </td></tr>";
                        }
                        else if($row["Denied"] == 1){
                            //If reservation is denied
                            echo "Denied </td><td>" . $row["DeniedReason"]. "</td></tr>";
                        }
                        else{
                            //If neither of the above are true, reservation is pending
                            echo "Pending </td><td> N/A </td></tr>";
                        }
                    }
                //----------------------------------------------------------------------------------------------//
                    ?>
                </table>
            </div>
            <!- ============================================================ ->
        </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#list').DataTable( {
      dom: 'lBfrtip', // elements, in order
      buttons: [  // exports buttons
      'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      "pageLength": 25, // define entities per page
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
  } );
    } );

</script>