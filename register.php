<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Orhpeus</title>
  <!-- Bootstrap core CSS -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container" align="center"  style="color: #34495e">

<img src="img/logo.jpeg" width="300px" alt="logo">

  <div class="col-lg-12 ">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <h2>Sign up</h2>
      <form method="POST">
        <table class="table table-responsive" >
          <tbody>
            <tr>
              <td><label>Username:</label></td>
              <td><input name="userName" type="text" value="" style='width:100%' ></td>
            </tr>

            <tr>
              <td><label>Student No:</label></td>
              <td><input name="studentNum" type="text" value="" ></td>
            </tr>

            <tr>
              <td><label>First Name:</label></td>
              <td><input name="firstName" type="text" value="" ></td>
            </tr>

            <tr>
              <td><label>Last Name:</label></td>
              <td><input name="lastName" type="text" value="" ></td>
            </tr>

            <tr>
              <td><label>Email:</label></td>
              <td><input name="email" type="text" value="" ></td>
            </tr>

            <tr>
              <td><label>Program:</label></td>
              <td><input name="program" type="text" value="" ></td>
            </tr>

            <tr>
              <td><label>Year:</label></td>
              <td><input name="year" type="text" value="" ></td>
            </tr>

            <tr>
              <td><label>Notes:</label></td>
              <td><textarea name="notes"  value="" rows="5" cols="30"></textarea></td>
            </tr>
          </tbody>
        </table>

        <button class='btn btn-primary' type="submit" style="width:100%">Sign Up</button>

      </form>
    </div>
    <div class="col-lg-3"></div>
  </div>
  <br>
  <label><a href="index.php" style="font-weight:normal">or sign in</a></label>
</div>
<?php include'footer.php' ?>
