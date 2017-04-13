<?php

    //---------------------INITIALIZE FIELDS----------------------//
$studentNumber = NULL;
$userName      = NULL;
$firstName     = NULL;
$lastName      = NULL;
    //------------------------------------------------------------//
if(isset($_SESSION['updateSuccess']) && $_SESSION['updateSuccess'] == TRUE){
    echo'User updated successfully';
    unset($_SESSION['updateSuccess']);
}
else if(isset($_SESSION['updateSuccess']) && $_SESSION['updateSuccess'] == FALSE){
    echo'Unable to update user';
    unset($_SESSION['updateSuccess']);
}

?>

<div class="container">
    <div class="col-lg-12">
    <h1><?php echo $title ?></h1><br>
        <!- ============================== Search Bar ============================== ->
        <!-- <div style="margin-bottom:50px">
            <form name="search" method="POST">
               <label>First Name:</label>
               <input id="firstName" name="firstName" type="text" value="" class="studentSearch">

               <label>Last Name:</label>
               <input id="lastName" name="lastName" type="text" value="" class="studentSearch">

               <button type="submit" name="searchButton" id="searchButton" class="btn btn-primary">Search</button>
           </form>
       </div> -->
       <!- ======================================================================== ->

       <!- ============================= Search Table ============================= ->
       <table id="list" class="table  table-responsive table-hover" >
        <thead>
            <tr>
                <th>Action</th>
                <th>Student Number</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <?php
                //---------------------------POPULATE SEARCH TABLE---------------------------//
        foreach($search as $row){
            echo "<tr>";
            echo "<td>";
            ?>
            <!-When view is clicked bring admin to user info page of user they clicked->
            <button class="btn btn-primary" onclick="window.location.href='DisplayUserInfo?StudentNumber=<?php echo $row['StudentNumber'] ?>'">View</a></button>
            <button class="btn btn-warning" onclick="window.location.href='EditUsers?StudentNumber=<?php echo $row['StudentNumber'] ?>'">Edit</a></button>
            <?php

            echo "</td>";
            echo "<td>".$row["StudentNumber"]."</td>";
            echo "<td>".$row["UserName"]."</td>";
            echo "<td>".$row["FirstName"]  ."</td>";
            echo "<td>".$row["LastName"]  ."</td>";
            echo "</tr>";
        }
                //---------------------------------------------------------------------------//
        ?>
    </table>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#list').DataTable( {
          "order": [[ 4, "asc" ]],
      // "pageLength": 25 // define entities per page
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
  } );
    } );
</script>
