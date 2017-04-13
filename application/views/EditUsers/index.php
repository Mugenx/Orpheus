<?php

if(isset($_SESSION['resetPasswordSuccess']) && $_SESSION['resetPasswordSuccess'] == TRUE){
    echo"Successfully reset user's password";
    unset($_SESSION['resetPasswordSuccess']);
}
if(isset($_SESSION['resetPasswordSuccess']) && $_SESSION['resetPasswordSuccess'] == FALSE){
    echo"Unable to reset user's password";
    unset($_SESSION['resetPasswordSuccess']);
}

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
    foreach($userinfo as $row){
        $studentNumber = $row['StudentNumber'];
        $userName      = $row['UserName'];
        $firstName     = $row['FirstName'];
        $lastName      = $row['LastName'];
        $email         = $row['Email'];
        $program       = $row['Program'];
        $year          = $row['Year'];
        $enabled       = $row['Enabled'];
        $loanAdmin     = $row['LoanAdmin'];
        $approver      = $row['Approver'];
        $notes         = $row['Notes'];
    }
}
        //--------------------------------------------------------------------------------//
?>
<div class="container">

    <!- ===================== Student Information ===================== ->
    <div class="col-lg-8 col-lg-offset-2">
    <h1><?php echo $title ?></h1>
        <form name="info" method="POST">
            <table class="table">

                <tr>
                    <td><label>Student No:</label></td>
                    <td><input id="studentNumber" name="studentNumber" type="text" value="<?php echo $studentNumber; ?>" class="studinfo" readonly></td>
                </tr>
                
                

                <tr>
                    <td><label>Username:</label></td>
                    <td><input id="userName" name="userName" type="text" value="<?php echo $userName; ?>" class="studinfo" required></td>
                </tr>
                
                


                <tr>
                    <td><label>First Name:</label></td>
                    <td><input id="firstName" name="firstName" type="text" value="<?php echo $firstName; ?>" class="studinfo" required></td>
                </tr>
                
                


                <tr>
                    <td><label>Last Name:</label></td>
                    <td><input id="lastName" name="lastName" type="text" value="<?php echo $lastName; ?>" class="studinfo" required></td>
                </tr>
                
                


                <tr>
                    <td><label>Email:</label></td>
                    <td><input id="email" name="email" type="text" value="<?php echo $email; ?>" class="studinfo" required></td>
                </tr>
                
                


                <tr>
                    <td><label>Program:</label></td>
                    <td><select id="program" name="program" class="studinfo">
                        <?php 
                    //Create dropdown menu that lists all programs in programs table
                        foreach($programinfo as $row){
                            unset($programID, $programName);
                            $programID = $row['ProgramID'];
                            $programName = $row['ProgramName']; 
                            if($programID == $program){
                            //If program is the one that the student is currently enrolled in, make that selected by default
                                echo '<option selected value="'.$programID.'">'.$programName.'</option>';
                            }
                            else{
                            //If program is not the one that the student is currently enrolled in, do not make it selected
                                echo '<option value="'.$programID.'">'.$programName.'</option>';
                            }
                        }
                        ?>
                    </select></td>
                </tr>
                
                


                <tr>
                    <td><label>Year:</label></td>
                    <td>                
                        <select id="year" name="year" class="studinfo">
                            <?php 
                            if($year != NULL){
                        //Create dropdown list that will list options to change year from 1 to 3
                                for($i=1; $i<=3; $i++){
                                    if($i == $year){
                                //If this year is the one that the student is currently in, make it selected by default
                                        echo '<option selected value="'.$i.'">'.$i.'</option>';
                                    }
                                    else{
                                //If this year is not the one that the student is currently in, do not make it selected by default
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                }
                            }
                            ?>
                        </select></td>
                    </tr>



                    <tr>
                        <td><label>Enabled:</label></td>
                        <td>
                            <input id="enabled" name="enabled" type="checkbox" class="studinfo" 
                            <?php
                            if($enabled == 1){
                        //Make enabled checkbox checked by default if user is currently set to enabled
                                echo 'checked';
                            }
                            ?>
                            ></td>
                        </tr>



                        <tr>
                            <td><label>Loan Admin:</label></td>
                            <td>
                                <input id="loanAdmin" name="loanAdmin" type="checkbox" class="studinfo" 
                                <?php
                    //Make loanAdmin checkbox checked by default if user is currently set to loan admin
                                if($loanAdmin == 1){
                                    echo 'checked';
                                }
                                ?>
                                ></td>
                            </tr>



                            <tr>
                                <td><label>Approver:</label></td>
                                <td><input id="approver" name="approver" type="checkbox" class="studinfo" 
                                    <?php
                    //Make approver checkbox checked by default if user is currently set to approver
                                    if($approver == 1){
                                        echo 'checked';
                                    }
                                    ?>
                                    ></td>
                                </tr>




                                <tr>
                                    <td><label>Notes:</label></td>
                                    <td><textarea id="notes" name="notes" class="studinfo" rows="5" cols="30"><?php echo $notes; ?></textarea></td>
                                </tr>



                            </table>

                            <button name="submitButton" class="btn btn-primary" style="width: 100%" id="submitButton" type="submit">Apply Changes</button>
                        </form>

                        <form method="POST" name="resetPass" onsubmit="return confirm('Are you sure you want to revert this user\'s password back to their last name?');">
                            <button name="resetPassword" class="btn btn-danger" style="margin-top:10px; width: 100%" id="resetPassword" type="submit">Reset Password</button>
                        </form>
                    </div>
                </div>

