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

        .studinfo input[type="checkbox"]{
            display: inline-block;
            width:   0px;
            float:   left;
        }

        .studinfo select{
            display: inline-block;
            width:   200px;
            float:   left;
        }

        .studinfo textarea{
        	display: inline-block;
            float:   left;
            resize:  none;
        }

        .studinfo button{
            display: inline-block;
            float:   left;
            clear:   left;
        }
    </style>
</head>
<body>

    <?php
        session_start();

        //--------------------CONNECT TO DATABASE----------------------//
        $servername = 'localhost';
        $username   = 'wp_eatery';
        $password   = 'password';
        $dbname     = 'loansystemtest';

        $conn = new mysqli($servername, $username, $password, $dbname);
        //------------------------------------------------------------//

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
        if(isset($_POST['searchButton'])){
            $studentNumTemp  = $_POST['studentNum'];

            if($studentNumTemp != NULL){
                $studentInfoQuery  = "SELECT * FROM tUsers WHERE fStudentNumber = '$studentNumTemp'";
                $studentInfoResult = $conn->query($studentInfoQuery);
                while ($row = $studentInfoResult->fetch_assoc()) {
                    $studentNumber = $row['fStudentNumber'];
                    $userName      = $row['fUserName'];
                    $firstName     = $row['fFirstName'];
                    $lastName      = $row['fLastName'];
                    $email         = $row['fEmail'];
                    $program       = $row['fProgram'];
                    $year          = $row['fYear'];
                    $enabled       = $row['fEnabled'];
                    $loanAdmin     = $row['fLoanAdmin'];
                    $approver      = $row['fApprover'];
                    $notes         = $row['fNotes'];

                    //This will be used if the admin changes the student number
                    //to preserve the original student number 
                    $_SESSION["studentNumberSession"] = $row['fStudentNumber'];
                }
            }
        }
        //--------------------------------------------------------------------------------//

        //-------------------------------UPDATE STUDENT INFO------------------------------//
        if(isset($_POST['submitButton'])){
            $userNameNew      = $_POST['userName'];
            $firstNameNew     = $_POST['firstName'];
            $lastNameNew      = $_POST['lastName'];
            $emailNew         = $_POST['email'];
            $programNew       = $_POST['program'];
            $yearNew          = $_POST['year'];
            $notesNew         = $_POST['notes'];

            if(isset($_POST['enabled'])){
                $enabledNew = 1;
            }
            else{
                $enabledNew = 0;
            }

            if(isset($_POST['loanAdmin'])){
                $loanAdminNew = 1;
            }
            else{
                $loanAdminNew = 0;
            }

            if(isset($_POST['approver'])){
                $approverNew = 1;
            }
            else{
                $approverNew = 0;
            }

            $sql = "UPDATE tUsers SET
                    fUserName      = ?,
                    fFirstName     = ?,
                    fLastName      = ?,
                    fEmail         = ?,
                    fProgram       = ?,
                    fYear          = ?,
                    fEnabled       = ?,
                    fLoanAdmin     = ?,
                    fApprover      = ?,
                    fNotes         = ?
                    WHERE fStudentNumber = ?";

            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("ssssiiiiisi", 
                                  $userNameNew,
                                  $firstNameNew,
                                  $lastNameNew,
                                  $emailNew,
                                  $programNew,
                                  $yearNew,
                                  $enabledNew,
                                  $loanAdminNew,
                                  $approverNew,
                                  $notesNew,
                                  $_SESSION["studentNumberSession"]);

                $stmt->execute();
            }
            else{
                var_dump($conn->error);
            }
        }
        //--------------------------------------------------------------------------------//
    ?>

    <div id="container" class="container">

        <div id="search" class="studsearch">
            <form name="search" method="POST">
                <label>Enter Student Number:</label>
                <input type="text" name="studentNum" value="" class="studsearch">

                <button type="submit" name="searchButton" id="searchButton" class="studsearch">Search</button>
            </form>
        </div><!-end search->

        <h3>Student Information</h3>

        <div id="info" class="studinfo">
            <form name="info" method="POST">
                <label>Student No:</label>
                <input id="studentNumber" name="studentNumber" type="text" value="<?php echo $studentNumber; ?>" class="studinfo" readonly><br> 

                <label>Username:</label>
                <input id="userName" name="userName" type="text" value="<?php echo $userName; ?>" class="studinfo" required><br>
 
                <label>First Name:</label>
                <input id="firstName" name="firstName" type="text" value="<?php echo $firstName; ?>" class="studinfo" required><br>
              
                <label>Last Name:</label>
                <input id="lastName" name="lastName" type="text" value="<?php echo $lastName; ?>" class="studinfo" required><br>

                <label>Email:</label>
                <input id="email" name="email" type="text" value="<?php echo $email; ?>" class="studinfo" required><br>
            
                <label>Program:</label>
                <select id="program" name="program" class="studinfo">
                    <?php 
                        if($program != NULL){
                            $sql = mysqli_query($conn, "SELECT fProgramID, fProgramName FROM tPrograms");
                            while ($row = $sql->fetch_assoc()){
                                unset($programID, $programName);
                                $programID = $row['fProgramID'];
                                $programName = $row['fProgramName']; 
                                if($programID == $program){
                                    echo '<option selected value="'.$programID.'">'.$programName.'</option>';
                                }
                                else{
                                    echo '<option value="'.$programID.'">'.$programName.'</option>';
                                }
                            }
                        }
                    ?>
                </select><br>
            
                <label>Year:</label>
                <select id="year" name="year" class="studinfo">
                    <?php 
                        if($year != NULL){
                            for($i=1; $i<=3; $i++){
                                if($i == $year){
                                    echo '<option selected value="'.$i.'">'.$i.'</option>';
                                }
                                else{
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            }
                        }
                    ?>
                </select><br>

                <label>Enabled:</label>
                <input id="enabled" name="enabled" type="checkbox" class="studinfo" 
                    <?php
                        if($enabled == 1){
                            echo 'checked';
                        }
                    ?>
                ><br>

                <label>Loan Admin:</label>
                <input id="loanAdmin" name="loanAdmin" type="checkbox" class="studinfo" 
                    <?php
                        if($loanAdmin == 1){
                            echo 'checked';
                        }
                    ?>
                ><br>

                <label>Approver:</label>
                <input id="approver" name="approver" type="checkbox" class="studinfo" 
                    <?php
                        if($approver == 1){
                            echo 'checked';
                        }
                    ?>
                ><br>
            
                <label>Notes:</label>
                <textarea id="notes" name="notes" class="studinfo" rows="5" cols="30"><?php echo $notes; ?></textarea><br>

                <button name="submitButton" id="submitButton" type="submit">Apply Changes</button>
            </form>
        </div><!-end info->

    </div><!-end container->

</body>
</html> 