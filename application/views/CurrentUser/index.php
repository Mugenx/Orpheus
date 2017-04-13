<?php

if(isset($_SESSION['passwordChangeSuccess']) && $_SESSION['passwordChangeSuccess'] == TRUE){
    echo"Password successfully updated";
    unset($_SESSION['passwordChangeSuccess']);
}
else if(isset($_SESSION['passwordChangeSuccess']) && $_SESSION['passwordChangeSuccess'] == FALSE){
    echo"Unable to update password";
    unset($_SESSION['passwordChangeSuccess']);
}

        //--------------------------GET STUDENT INFO FROM DATABASE-------------------------//
$studentNumber = $_SESSION['student_number'];
$userName      = NULL;
$firstName     = NULL;
$lastName      = NULL;
$email         = NULL;
$program       = NULL;
$year          = NULL;
$notes         = NULL;

foreach($userinfo as $row){
    $userName  = $row['UserName'];
    $firstName = $row['FirstName'];
    $lastName  = $row['LastName'];
    $email     = $row['Email'];
    $program   = $row['ProgramName'];
    $year      = $row['Year'];
    $notes     = $row['Notes'];
}
        //--------------------------------------------------------------------------------//
?>

<div class="container">
    <div class="col-lg-10 col-lg-offset-1">
        <!- ==================== Student Info =================== ->
        <h3>Student Information</h3>
        <table class="table">
            <tr>
                <td><label>Student No:</label></td>
                <td><?php echo $studentNumber ?></td>
            </tr>
            <tr>
                <td><label>Username:</label></td>
                <td><?php echo $userName ?></td>
            </tr>
            <tr>
                <td><label>First Name:</label></td>
                <td><?php echo $firstName ?></td>
            </tr>
            <tr>
                <td><label>Last Name:</label></td>
                <td><?php echo $lastName ?><br></td>
            </tr>
            <tr>
                <td><label>Email:</label></td>
                <td><?php echo $email ?></td>
            </tr>

            <tr>
                <td><label>Program:</label></td>
                <td><?php echo $program ?></td>
            </tr>

            <tr>
                <td><label>Year:</label></td>
                <td><?php echo $year ?></td>
            </tr>

            <tr>
                <td><label>Notes:</label></td>
                <td><textarea name="notes" class="studinfo" rows="5" cols="30" readonly><?php echo $notes ?></textarea></td>
            </tr>
            

            
        </table>
        <button onclick="window.location.href='ChangePassword'" class="btn btn-primary">Change Password</button>
        <!- ===================================================== ->




        <!- ===================== Loan Table ==================== ->
        <div  >
            <h3>Items on Loan</h3>
            <table class="table">
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
    <!- ===================================================== ->




    <!- ================= Reservation Table ================= ->
    <div id="reservations" class="reservinfo">
        <h3>Reservations</h3>
        <table id="list" class="table table-responsive table-striped table-hover">
            <thead>
                <tr>
                    <th>Edit/Delete</th>
                    <th>Name</th>
                    <th>Reserve Start</th>
                    <th>Reserve End</th>
                    <th>Status</th><!-approved/denied->
                    <th>Reason for Denial</th>
                </tr>
            </thead>
            <?php

                    //--------------------------GET STUDENTS RESERVATION INFO FROM DATABASE-------------------------//
            foreach($reserveinfo as $row){
                echo "<tr>";
                echo "<td>";
                ?>
                <button class="btn btn-warning" style='margin-top:5px; width:70px' onclick="window.location.href='EditReservations?ReservationID=<?php echo $row['ReservationID'] ?>'">Edit</a></button><br>
                <button class="btn btn-danger" style='margin-top:5px; width:70px' onclick="confirmDelete(<?php echo $row['ReservationID'] ?>)">Delete</a></button>
                <?php
                echo "</td>";
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

    <script>
        function confirmDelete(id){
            var con = confirm("Are you sure you want to delete this reservation?")
            if (con == true){
                window.location.href= "DeleteReservations?ReservationID=" + id;
            }
        }
    </script>


    <script type="text/javascript">
      $(document).ready(function() {
        $('#list').DataTable( {
      // dom: 'lfrtip', // elements, in order

      "pageLength": 25, // define entities per page
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
  } );
    } );

</script>

