

<?php

if(isset($_SESSION['uploadFileSuccess']) && $_SESSION['uploadFileSuccess'] == TRUE){
            //If user has just attempted to import a text file, this will display if it was successful
    echo 'Successfully imported users from file';
            //Unset session variable
    unset($_SESSION['uploadFileSuccess']);
}
else if(isset($_SESSION['uploadFileSuccess']) && $_SESSION['uploadFileSuccess'] == FALSE){
            //If user has just attempted to import a text file, this will display if it was unsuccessful
    echo 'Unable to import users from file';
            //Unset session variable
    unset($_SESSION['uploadFileSuccess']);
}

if(isset($_SESSION['addUserSuccess']) && $_SESSION['addUserSuccess'] == TRUE){
            //Tell admin that user was added successfully
    echo 'Successfully added user';
            //Unset session var
    unset($_SESSION['addUserSuccess']);
}
else if(isset($_SESSION['addUserSuccess']) && $_SESSION['addUserSuccess'] == FALSE){
            //Tell admin that user was unable to add
    echo 'Unable to add user';
            //Unset session var
    unset($_SESSION['addUserSuccess']);
}

?>

<div class="container">

    <div class="col-lg-8 col-lg-offset-2" >
        <h2><?php echo $title ?></h2>
        <!- ======================== Enter Student Info ======================== ->
        <h3>Enter User Information</h3>

        <div id="info" class="studinfo" align="left">
            <form name="info" method="POST">
                <table class="table" >
                    <tr>
                        <td><label>Student No:</label></td>
                        <td><input name="studentNum" type="text" value="" class="studinfo" required></td>
                    </tr>
                    
                    

                    <tr>
                        <td><label>Username:</label></td>
                        <td><input name="userName" type="text" value="" class="studinfo" required></td>
                    </tr>
                    
                    


                    <tr>
                        <td><label>First Name:</label></td>
                        <td ><input name="firstName" type="text" value="" class="studinfo" required></td>
                    </tr>
                    
                    


                    <tr>
                        <td><label>Last Name:</label></td>
                        <td><input name="lastName" type="text" value="" class="studinfo" required></td>
                    </tr>
                    
                    


                    <tr>
                        <td><label>Email:</label></td>
                        <td><input name="email" type="text" value="" class="studinfo" required></td>
                    </tr>
                    
                    


                    <tr>
                        <td><label>Program:</label></td>
                        <td><select name="program" class="studinfo">
                            <?php 
                            foreach($programs as $row){
                                unset($programID, $programName);
                                $programID = $row['ProgramID'];
                                $programName = $row['ProgramName']; 
                                echo '<option value="'.$programID.'">'.$programName.'</option>';
                            }
                            ?>
                        </select></td>
                    </tr>
                    
                    
                    <tr>
                        <td><label>Year:</label></td>
                        <td><select name="year" class="studinfo">               
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select></td>
                    </tr>


                    <tr>
                        <td><label>Enabled:</label></td>
                        <td><input name="enabled" type="checkbox" class="studinfo" checked ></td>
                    </tr>
                    
                    


                    <tr>
                        <td><label>Loan Admin:</label></td>
                        <td><input name="loanAdmin" type="checkbox" class="studinfo"></td>
                    </tr>
                    
                    


                    <tr>
                        <td><label>Approver:</label></td>
                        <td><input name="approver" type="checkbox" class="studinfo"></td>
                    </tr>
                    
                    


                    <tr>
                        <td><label>Notes:</label></td>
                        <td><textarea name="notes" class="studinfo" value="" rows="5" cols="30"></textarea></td>
                    </tr>
                    
                    

                </table>
                <button name="submitButton" id="submitButton" class="btn btn-primary" style="width: 100%" type="submit">Add User</button>
            </form>
        </div>
        <!- ==================================================================== ->

        <!- ========================= Upload Text File ========================= ->
        <div id="uploadfile" class="uploadfile">
            <button id="toUploadFilePage" class="btn btn-warning" style="margin-top:10px; width: 100%">Upload Text File</button>
        </div>
        <!- ==================================================================== ->
    </div>
</div>

<!- Bring user to upload file page when upload file button is clicked ->
<script type="text/javascript">
    document.getElementById("toUploadFilePage").onclick = function (){
            //Go to upload file page if admin wishes to add users that way
            window.location.href = "ProcessFile";
        };
    </script>
