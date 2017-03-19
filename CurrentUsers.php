<html>
<head>
    <style type="text/css">
        .studinfo{
            margin-bottom: 5px
        }

        .studinfo label{
        	display: inline-block;
            float:   left;
            clear:   left;
            width:   100px;
        }

        .studinfo textarea{
            display: inline-block;
            float:   left;
            resize:  none;
        }

        .loaninfo{
        	float: left;
        	clear: both;
        }

        .loaninfo th{
            width:     125px;
            font-size: 12;
        }

        .reservinfo{
        	float: left;
        	clear: both;
        }

        .reservinfo th{
            width:     125px;
            font-size: 12;
        }
    </style>
</head>
<body>

    <?php
        $studno = 040828055;//This variable will be used later in development with queries

        //--------------------CONNECT TO DATABASE----------------------//
        $servername = 'localhost';
        $username   = 'wp_eatery';
        $password   = 'password';
        $dbname     = 'alms';

        $conn = new mysqli($servername, $username, $password, $dbname);
        //------------------------------------------------------------//

        //--------------------------GET STUDENT INFO FROM DATABASE-------------------------//
        $studentInfoQuery  = "SELECT * FROM Users WHERE StudentNumber = 040828055";
        $studentInfoResult = $conn->query($studentInfoQuery);
        while ($row = $studentInfoResult->fetch_assoc()) {
            $studentNumber = $row['StudentNumber'];
            $userName      = $row['UserName'];
            $firstName     = $row['FirstName'];
            $lastName      = $row['LastName'];
            $email         = $row['Email'];
            $program       = $row['Program'];
            $year          = $row['Year'];
            $notes         = $row['Notes'];
        }
        //--------------------------------------------------------------------------------//
    ?>

    <div id="container" class="container">

        <!- ==================== Student Info =================== ->
        <h3>Student Information</h3>
        <div id="info" class="studinfo">
                <label>Student No:</label><?php echo $studentNumber?><br>

                <label>Username:</label><?php echo $userName?><br>
 
                <label>First Name:</label><?php echo $firstName?><br>
              
                <label>Last Name:</label><?php echo $lastName?><br>

                <label>Email:</label><?php echo $email?><br> 
            
                <label>Program:</label><?php echo $program?><br>
            
                <label>Year:</label><?php echo $year?><br>
            
                <label>Notes:</label>
                <textarea name="notes" class="studinfo" rows="5" cols="30"><?php echo $notes?></textarea><br>
        </div>
        <!- ===================================================== ->

        <!- ===================== Loan Table ==================== ->
        <div id="loans" class="loaninfo">
            <h3>Items on Loan</h3>
            <table border="1">
                <thead>
                    <tr>
                        <th>Tag</th>
                        <th>Name</th>
                        <th>Due Date</th>
                    </tr>
                </thead>
                <!-Data of student's loaned equipment will go here->
                <?php

                    $loansQuery  = "SELECT Equipment.Name, Equipment.EquipmentTag, LoanedOut.StudentNumber, LoanedOut.DueDate 
                                    FROM Equipment, LoanedOut 
                                    WHERE Equipment.EquipmentRecordID = LoanedOut.EquipmentRecordID AND LoanedOut.StudentNumber = '$studentNumber'";
                    $loansResult = $conn->query($loansQuery);
                    if($loansResult != false){
                        while($row = mysqli_fetch_array($loansResult)){
                            echo "<tr>
                                  <td>".$row["EquipmentTag"]."</td>
                                  <td>".$row["Name"]        ."</td>
                                  <td>".$row["DueDate"]     ."</td>
                                  </tr>";
                        }
                    }

                ?>
            </table>
        </div>
        <!- ===================================================== ->

        <!- ================= Reservation Table ================= ->
        <div id="reservations" class="reservinfo">
            <h3>Reservations</h3>
            <table border="1">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Reserve Start</th>
                        <th>Reserve End</th>
                        <th>Status</th><!-approved/denied->
                        <th>Reason for Denial</th>
                    </tr>
                </thead>
                <?php

                    $reserveQuery  = "SELECT Equipment.Name, ReserveStart, ReserveEnd, Approved, Denied, DeniedReason 
                                      FROM Reservations, Equipment 
                                      WHERE Reservations.EquipmentRecordID = Equipment.EquipmentRecordID 
                                      AND Reservations.StudentNumber = '$studentNumber'";
                    $reserveResult = $conn->query($reserveQuery);
                    if($reserveResult != false){
                        while($row = mysqli_fetch_array($reserveResult)){
                            echo "<tr>
                                  <td>".$row["Name"]."</td>
                                  <td>".$row["ReserveStart"]."</td>
                                  <td>".$row["ReserveEnd"]  ."</td>
                                  <td>";
                            if($row["Approved"] == 1){
                                //If reservation is approved
                                echo  "Approved </td><td> N/A </td></tr>";
                            }
                            else if($row["fDenied"] == 1){
                                //If reservation is denied
                                echo "Denied </td><td>" . $row["DeniedReason"]. "</td></tr>";
                            }
                            else{
                                //If neither of the above are true, reservation is pending
                                echo "Pending </td><td> N/A </td></tr>";
                            }
                        }
                    }

                ?>
            </table>
        </div>
        <!- ===================================================== ->

    </div><!-end container->

</body>
</html> 