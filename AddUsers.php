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

        //--------------------CONNECT TO DATABASE----------------------//
        $servername = 'localhost';
        $username   = 'wp_eatery';
        $password   = 'password';
        $dbname     = 'loansystemtest';

        $conn = new mysqli($servername, $username, $password, $dbname);
        //------------------------------------------------------------//

        //-------------------INSERT INTO DATABASE---------------------//
        if(isset($_POST['submitButton'])){
            $studentNum  = $_POST['studentNum'];
            $userName    = $_POST['userName'];
            $firstName   = $_POST['firstName'];
            $lastName    = $_POST['lastName'];
            $email       = $_POST['email'];
            $program     = $_POST['program'];
            $year        = $_POST['year'];
            $notes       = $_POST['notes'];

            if(isset($_POST['enabled'])){
                $enabled = 1;
            }
            else{
                $enabled = 0;
            }

            if(isset($_POST['loanAdmin'])){
                $loanAdmin = 1;
            }
            else{
                $loanAdmin = 0;
            }

            if(isset($_POST['approver'])){
                $approver = 1;
            }
            else{
                $approver = 0;
            }

            $sql  = "INSERT INTO tUsers (fStudentNumber, fUserName, fFirstName, fLastName, fEmail, fProgram, fYear, fEnabled, fLoanAdmin, fApprover, fNotes) 
                     VALUES (?,?,?,?,?,?,?,?,?,?,?)";

            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("issssiiiiis", 
                                  $studentNum,
                                  $userName,
                                  $firstName,
                                  $lastName,
                                  $email,
                                  $program,
                                  $year,
                                  $enabled,
                                  $loanAdmin,
                                  $approver,
                                  $notes);

                $stmt->execute();
            }
            else{
                var_dump($conn->error);
            }
        }
        //------------------------------------------------------------//

    ?>

    <div id="container" class="container">

        <h3>Enter User Information</h3>

        <div id="info" class="studinfo">
            <form name="info" method="POST">
                <label>Student No:</label>
                <input name="studentNum" type="text" value="" class="studinfo" required><br> 

                <label>Username:</label>
                <input name="userName" type="text" value="" class="studinfo" required><br>
 
                <label>First Name:</label>
                <input name="firstName" type="text" value="" class="studinfo" required><br>
              
                <label>Last Name:</label>
                <input name="lastName" type="text" value="" class="studinfo" required><br>

                <label>Email:</label>
                <input name="email" type="text" value="" class="studinfo" required><br> 
            
                <label>Program:</label>
                <select name="program" class="studinfo">
                    <?php 
                        $sql = mysqli_query($conn, "SELECT fProgramID, fProgramName FROM tPrograms");
                        while ($row = $sql->fetch_assoc()){
                            unset($programID, $programName);
                            $programID = $row['fProgramID'];
                            $programName = $row['fProgramName']; 
                            echo '<option value="'.$programID.'">'.$programName.'</option>';
                        }
                    ?>
                </select><br>
            
                <label>Year:</label>
                <select name="year" class="studinfo">               
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select><br>
                
                <label>Enabled:</label>
                <input name="enabled" type="checkbox" class="studinfo" checked><br>

                <label>Loan Admin:</label>
                <input name="loanAdmin" type="checkbox" class="studinfo"><br>

                <label>Approver:</label>
                <input name="approver" type="checkbox" class="studinfo"><br>
            
                <label>Notes:</label>
                <textarea name="notes" class="studinfo" value="" rows="5" cols="30"></textarea><br>

                <button name="submitButton" id="submitButton" type="submit">Add User</button>
            </form>
        </div><!-end info->

</body>
</html> 