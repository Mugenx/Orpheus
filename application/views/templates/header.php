<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=0.8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ALMS <?php echo $title ?></title>

  <!-- Bootstrap core CSS -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <!-- Date picker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Time picker -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

  <!-- data table -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

  <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js"></script>
  <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>


  <!-- css -->
  <link rel="stylesheet" href="<?php echo asset_url();?>css/style.css">
</head>


<body>


  <!-- NAVBAR -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only" >ALMS</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="loan" style="color: white; font-family: Georgia">ALMS</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <?php
      if($_SESSION['admin'])
      {
       echo "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
       <ul class='nav navbar-nav'>
        <li id='d1' class='dropdown'>
          <a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Equipment <span class='caret'></span></a>
          <ul class='dropdown-menu'>
            <li><a href='equiplist'>Equipment list</a></li>
            <li><a href='addEquip'>Add Equipment</a></li>
          </ul>
        </li>
      </ul>";
    }
    ?>

    <ul class="nav navbar-nav navbar-left" style="margin-left:20px">
      
      <?php
      if($_SESSION['admin'])
      {
        echo "
        <li><a href='loan'>Loan</a></li>
        <li><a href='reservations'>Reservations</a></li>
        <li><a href='returns'>Returns</a></li>
        <li><a href='manageusers'>User Management</a></li>
        <li><a href='reports'>Reports</a></li>";
      }
      ?>
    </ul>

    <ul class="nav navbar-nav navbar-right">          
      <li><a href="CurrentUser"><?php echo $_SESSION['login_user'] ?></a></li>          
      <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span></a></li>
    </ul>

  </li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<!-- toTop -->
<div class="elevator-wrapper"></div>
