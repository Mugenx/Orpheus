<?php include'header.php' ?>
<?php require_once('controller/controller.php'); ?>
<div class="container">

<div class="col-lg-12">


  <?php

  try {
    $modelDAO = new Controller();
    $user = $modelDAO->getCurrentUser();
  } catch (Exception $e) {
    echo '<h3>Error on page.</h3>';
    echo '<p>' . $e->getMessage() . '</p>';
  }

  ?>

  <div class="col-lg-12">
    <h3>Student Information</h3>
    <table class="table table-responsive" >
      <tbody>
        <tr>
          <td><label>Username:</label></td>
          <td><?php echo $user->getuserName()?></td>
        </tr>

        <tr>
          <td><label>Student No:</label></td>
          <td><?php echo $user->getstudentNo()?></td>
        </tr>

        <tr>
          <td><label>First Name:</label></td>
          <td><?php echo $user->getfirstName()?></td>
        </tr>

        <tr>
          <td><label>Last Name:</label></td>
          <td><?php echo $user->getlastName()?></td>
        </tr>

        <tr>
          <td><label>Email:</label></td>
          <td><?php echo $user->getemail()?></td>
        </tr>

        <tr>
          <td><label>Program:</label></td>
          <td><?php echo $user->getprogram()?></td>
        </tr>

        <tr>
          <td><label>Year:</label></td>
          <td><?php echo $user->getyear()?></td>
        </tr>

        <tr>
          <td><label>Notes:</label></td>
          <td><?php echo $user->getnotes()?></td>
        </tr>

      </tbody>
    </table>
  </div>

  <div class="col-lg-12">
    <h3>Items on Loan</h3>
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Tag</th>
          <th>Name</th>
          <th>Due Date</th>
        </tr>
      </thead>
      <!-Data of student's loaned equipment will go here->

    </table>
  </div><!-end loans->

  <div class="col-lg-12">
    <h3>Reservations</h3>
    <table class="table table-responsive">
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

</div>



<?php include'footer.php' ?>
