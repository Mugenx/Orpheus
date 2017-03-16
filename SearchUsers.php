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
                <label>Student No:</label><?php echo $studentNumber; ?><br> 

                <label>Username:</label><?php echo $userName; ?><br>
 
                <label>First Name:</label><?php echo $firstName; ?><br>
              
                <label>Last Name:</label><?php echo $lastName; ?><br>

                <label>Email:</label><?php echo $email; ?><br>
            
                <label>Program:</label><?php echo $program?><br>
            
                <label>Year:</label><?php echo $year?><br>

                <label>Enabled:</label>
                    <?php
                        if($enabled == 1){
                            echo 'Yes';
                        }
                        else if($enabled == 0 && $enabled != NULL){
                            echo'No';
                        }
                    ?>
                <br>

                <label>Loan Admin:</label>
                    <?php
                        if($loanAdmin == 1){
                            echo 'Yes';
                        }
                        else if($loanAdmin == 0 && $loanAdmin != NULL){
                            echo'No';
                        }
                    ?>
                <br>

                <label>Approver:</label>
                    <?php
                        if($approver == 1){
                            echo 'Yes';
                        }
                        else if($approver == 0 && $approver != NULL){
                            echo'No';
                        }
                    ?>
                <br>
            
                <label>Notes:</label>
                <textarea id="notes" name="notes" class="studinfo" rows="5" cols="30"><?php echo $notes; ?></textarea><br>
        </div><!-end info->

    </div><!-end container->

</body>
</html> 