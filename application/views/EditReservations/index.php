<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>




<?php

foreach($reservationinfo as $row){
    $equipmentname = $row['Name'];
}

if(isset($_SESSION['updateReservationSuccess']) && $_SESSION['updateReservationSuccess'] == TRUE){
    //If user was able to successfully edit the reservation date
    echo '<script>';
    echo 'window.location.href = "CurrentUser";';
    echo '</script>';
    unset($_SESSION['updateReservationSuccess']);
}
else if(isset($_SESSION['updateReservationSuccess']) && $_SESSION['updateReservationSuccess'] == FALSE){
    //If someone else has already reserved the equipment for that date
    echo "Unable to edit date, this equipment is already reserved for that date";
    //Unset session variable to prevent error message from continuously displaying
    unset($_SESSION['updateReservationSuccess']);
}

if(isset ($_POST['backButton'])){
    //Back to current users page if user clicks back
   echo '<script>';
   echo 'window.location.href = "CurrentUser";';
   echo '</script>';
}

?>    


<div class="container" style="margin-bottom: 300px">
    <div class="col-lg-12">
        <h1><?php echo $title ?></h1>
        <form method="POST">
            <label>Edit reservation date for <?php echo $equipmentname ?></label><br>
            <label for="reservationDate">Reservation Start Date</label>
            <input type="text" id="reservationDate" name="reservationDate" readonly/>
            <input type="submit" name="submitButton" class="btn btn-primary" value="Submit date"/>
            <input type="submit" name="backButton" class="btn btn-danger" value="Back"/>
        </form>
    </div>
</div>
<script>
    $(function() {
       var dateToday = new Date(); 
       $( "#reservationDate" ).datepicker({
                defaultDate:    dateToday,//Date starts on today's date
                changeMonth:    true,
                numberOfMonths: 2,//Show 2 months
                minDate:        dateToday,//Cannot select a date earlier than today's date
                maxDate:        "+14D",//Cannot select a date past 14 days in the future
                beforeShowDay:  $.datepicker.noWeekends//Do not allow weekends to be selected
            });
   });
</script>

