<?php

if(isset ($_POST['acceptButton'])){
        //Bring user back to manage users page
    echo '<script>';
    echo 'window.location.href = "ManageUsers";';
    echo '</script>';

}
if(isset ($_POST['denyButton'])){
        //If user clicks deny, bring user back to manage users page
    echo '<script>';
    echo 'window.location.href = "ManageUsers";';
    echo '</script>';
}

?>    
<div class="container">
    <div class="col-lg-12" align="center">
        <h1><?php echo $title ?></h1>
        <form method="POST">
            <span style="font-size: 18px">Are you sure you want to disable all users? (Admins will not be affected)</span><br><br>
            <input type="submit" class="btn btn-primary" style="width:400px" name="acceptButton" value="Accept"/><br><br>
            <input type="submit" class="btn btn-danger" style="width:400px" name="denyButton" value="Deny"/>
        </form>
    </div>
</div>

