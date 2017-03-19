<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php

error_reporting(E_ALL ^ E_WARNING);

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "alms";

$conn = new mysqli($servername, $username, $password, $dbname);


if($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}


if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $LoginUserName = $_POST['username'];
  $LoginPassword = $_POST['password'];

  $sql = "SELECT Approver, Enabled, LastName, LoanAdmin, UserName FROM users WHERE UserName = '$LoginUserName'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);

  if($count < 1 || !$row[Enabled] || $row[LastName] != $LoginPassword)
  {
    echo "Invalid username or password";
  }
  else
  {
    header("location: current_user.php");
  }
}

?>



<div class="container" align="center" style="color: #34495e">
  <!-- <div class="col-lg-12">
  <h1>WELCOME TO ORPHEUS</h1>
</div> -->

<img src="img/logo.jpeg" width="300px" alt="logo">



<form class="form-signin" action="" method = "post">
  <h2 class="form-signin-heading">Please sign in</h2>
  <label for="inputEmail" class="sr-only">User Name</label>
  <input type="text" name="username" class="form-control" placeholder="User Name" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" class="form-control" placeholder="Password" required>
  <div class="checkbox">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <label><a href="register.php" style="font-weight:normal">or sign up</a></label>
</form>
</div>


</body>
</html>