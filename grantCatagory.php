<?php require_once('controller/controller.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <body style="background-color: #ddd; color:#34495e">
    <?php
    try{
      $modelDAO = new Controller();
      $equipments = $modelDAO->getCategory();
      if($equipments){
        //We only want to output the table if we have customer.
        //If there are none, this code will not run.
        echo '<table class="table table-responsive table-hover"
        align="center">';
        foreach($equipments as $equipment){
          echo '<tr>';
          echo '<td>' . $equipment->getCategory() . '</td>';
          echo '</tr>';
        }
        echo '</table>';
      }

    }catch(Exception $e){
      //If there were any database connection/sql issues,
      //an error message will be displayed to the user.
      echo '<h3>Error on page.</h3>';
      echo '<p>' . $e->getMessage() . '</p>';
    }

    ?>
  </body>
</html>
