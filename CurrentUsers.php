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

        .studinfo input{
        	display: inline-block;
            width:   200px;
            float:   left;
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
            $userName      = $row['fUserName'];
            $studentNumber = $row['fStudentNumber'];
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

        <h3>Student Information</h3>

        <div id="info" class="studinfo">
            <form name="info">
                <label>Username:</label>
                <input type="text" value="<?php echo $userName?>" class="studinfo" readonly><br>

                <label>Student No:</label>
                <input type="text" value="<?php echo $studentNumber?>" class="studinfo" readonly><br> 
 
                <label>First Name:</label>
                <input type="text" value="<?php echo $firstName?>" class="studinfo" readonly><br>
              
                <label>Last Name:</label>
                <input type="text" value="<?php echo $lastName?>" class="studinfo" readonly><br>

                <label>Email:</label>
                <input type="text" value="<?php echo $email?>" class="studinfo" readonly><br> 
            
                <label>Program:</label>
                <input type="text" value="<?php echo $program?>" class="studinfo" readonly><br>
            
                <label>Year:</label>
                <input type="text" value="<?php echo $year?>" class="studinfo" readonly><br>
            
                <label>Notes:</label>
                <textarea class="studinfo" value="<?php echo $notes?>" rows="5" cols="30" readonly></textarea><br>
            </form>
        </div><!-end info->

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

                    $loansQuery  = "SELECT tEquipment.fName, tEquipment.fEquipmentTag, tLoanedOut.fEquipmentTag, tLoanedOut.fStudentNumber, 
                                    tUsers.fStudentNumber, tLoanedOut.fDueDate 
                                    FROM tEquipment, tLoanedOut, tusers 
                                    WHERE tEquipment.fEquipmentTag = tLoanedOut.fEquipmentTag 
                                    AND tLoanedOut.fStudentNumber = tUsers.fStudentNumber";
                    $loansResult = $conn->query($loansQuery);
                    if ($loansResult->num_rows > 0) {
                        while($row = $loansResult->fetch_assoc()) {
                         echo "<tr><td>" . $row["fEquipmentTag"]. "</td><td>" . $row["fName"]. "</td><td>" . $row["fDueDate"]. "</td></tr>";
                        }
                    }

                ?>
            </table>
        </div><!-end loans->

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
            </table>
        </div><!-end reservations->

    </div><!-end container->

</body>
</html> 

