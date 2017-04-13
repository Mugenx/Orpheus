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

            $sql  = "INSERT INTO tUsers (fStudentNumber, fUserName, fFirstName, fLastName, fEmail, fProgram, fYear, fNotes) 
                     VALUES (?,?,?,?,?,?,?,?)";

            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("issssiis", 
                                  $studentNum,
                                  $userName,
                                  $firstName,
                                  $lastName,
                                  $email,
                                  $program,
                                  $year,
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

        <h3>Student Information</h3>

        <div id="info" class="studinfo">
            <form name="info" method="POST">
                <label>Username:</label>
                <input name="userName" type="text" value="" class="studinfo"><br>

                <label>Student No:</label>
                <input name="studentNum" type="text" value="" class="studinfo"><br> 
 
                <label>First Name:</label>
                <input name="firstName" type="text" value="" class="studinfo"><br>
              
                <label>Last Name:</label>
                <input name="lastName" type="text" value="" class="studinfo"><br>

                <label>Email:</label>
                <input name="email" type="text" value="" class="studinfo"><br> 
            
                <label>Program:</label>
                <input name="program" type="text" value="" class="studinfo"><br>
            
                <label>Year:</label>
                <input name="year" type="text" value="" class="studinfo"><br>
            
                <label>Notes:</label>
                <textarea name="notes" class="studinfo" value="" rows="5" cols="30"></textarea><br>

                <button name="submitButton" id="submitButton" type="submit">Add User</button>
            </form>
        </div><!-end info->

</body>
</html> 