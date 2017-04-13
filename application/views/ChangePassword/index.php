<?php

if(isset($_POST['submit'])){
 echo'<script>';
 echo'window.location.href="CurrentUser";';
 echo'</script>';
}

?>


<div class="container">
    <div class="col-lg-6 col-lg-offset-3">
        <h1><?php echo $title ?></h1>
        <form method="POST">
         <table class="table">
             <tr>
                 <td><label>Current Password:</label></td>
                 <td><input type="password" name="currentPassword" id="currentPassword" class="passchange"/></td>
             </tr>

             <tr>
                 <td><label>New Password:</label></td>
                 <td><input type="password" name="newPassword" id="newPassword" class="passchange"/></td>
             </tr>
         </table>

         <button type="submit" name="submit" id="submit" style="width: 100%" class="btn btn-primary">Accept</button><br><br>
         <button onclick='window.location.href="CurrentUser"' style="width: 100%"  class="btn btn-danger">Back</button>
     </form>
 </div>
</div>
