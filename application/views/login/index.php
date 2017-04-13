<?php
// session_start();
// if(isset($_SESSION['login_user']))
// {
//   header("location:loan");
// }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ALMS Login</title>

  <!-- Bootstrap core CSS -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <!-- css -->
  <script src="js/toTop.js"></script>
  <link rel="stylesheet" href="<?php echo asset_url();?>css/style.css">
</head>
<body>

  <div class="container" align="center" style="color: #34495e">
    <img src="<?php echo asset_url();?>img/logo.jpeg" width="300px" alt="logo">
    <form class="form-signin" action="<?php echo base_url('login/to_login') ?>" method = "post">
      <h2 class="form-signin-heading">Please sign in</h2>
      <label for="inputEmail" class="sr-only">User Name</label>
      <input type="text" name="username" class="form-control" placeholder="User Name" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
  </div>

  <!-- <div align="center" style="color: red"><?php echo $_SESSION['error']; ?></div> -->

<footer class="footer navbar-fixed-bottom" style=" margin-top: 100px">
	<!-- <p class="pull-right"><a href="#">Back to top</a></p> -->
	<p align="center" style="margin: 50px 0; color: #003366;">&copy; <?php echo date("Y"); ?> Algonquin College . All Rights Reserved.</p>
</footer>

</body>

</body>
</html>


