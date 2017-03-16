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
        $dbname     = 'loansystemtest';

        $conn = new mysqli($servername, $username, $password, $dbname);
        //------------------------------------------------------------//

        //--------------------------GET STUDENT INFO FROM DATABASE-------------------------//
        $studentInfoQuery  = "SELECT * FROM tUsers WHERE fStudentNumber = 040828055";
        $studentInfoResult = $conn->query($studentInfoQuery);
        while ($row = $studentInfoResult->fetch_assoc()) {
            $studentNumber = $row['fStudentNumber'];
            $userName      = $row['fUserName'];
            $firstName     = $row['fFirstName'];
            $lastName      = $row['fLastName'];
            $email         = $row['fEmail'];
            $program       = $row['fProgram'];
            $year          = $row['fYear'];
            $notes         = $row['fNotes'];
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

                    $loansQuery  = "SELECT tEquipment.fName, tLoanedOut.fEquipmentTag, tLoanedOut.fStudentNumber, tLoanedOut.fDueDate 
                                    FROM   tEquipment, tLoanedOut
                                    WHERE  tEquipment.fEquipmentTag = tLoanedOut.fEquipmentTag 
                                    AND    tLoanedOut.fStudentNumber = '$studentNumber'";
                    $loansResult = $conn->query($loansQuery);
                    while($row = mysqli_fetch_array($loansResult)){
                        echo "<tr>
                              <td>".$row["fEquipmentTag"]."</td>
                              <td>".$row["fName"]        ."</td>
                              <td>".$row["fDueDate"]     ."</td>
                              </tr>";
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

                    $reserveQuery  = "SELECT fCategoryName, fReserveStart, fReserveEnd, fApproved, fDenied, fDeniedReason 
                                      FROM   tReservations, tCategoryTree 
                                      WHERE  tCategoryTree.fCategoryID = tReservations.fCategoryID 
                                      AND    tReservations.fStudentNumber = '$studentNumber'";
                    $reserveResult = $conn->query($reserveQuery);
                    while($row = mysqli_fetch_array($reserveResult)){
                        echo "<tr>
                              <td>".$row["fCategoryName"]."</td>
                              <td>".$row["fReserveStart"]."</td>
                              <td>".$row["fReserveEnd"]  ."</td>
                              <td>";
                        if($row["fApproved"] == 1){
                            //If reservation is approved
                            echo  "Approved </td><td> N/A </td></tr>";
                        }
                        else if($row["fDenied"] == 1){
                            //If reservation is denied
                            echo "Denied </td><td>" . $row["fDeniedReason"]. "</td></tr>";
                        }
                        else{
                            //If neither of the above are true, reservation is pending
                            echo "Pending </td><td> N/A </td></tr>";
                        }
                    }

                ?>
            </table>
        </div>
        <!- ===================================================== ->

    </div><!-end container->

</body>
</html> 