<?php include'header.php' ?>
<?php require_once('controller/controller.php'); ?>
<div class="container" align="center">
  <div class="col-lg-12">
    <div  style="text-align: left; font-size: 18px; margin-left:10px">
      <h3>LOAN</h3>
      <p>
        1) Find an item by selecting it from the categories on the left.<br>
        2) Choose a loan and return date and time. Please folow to the guidelines on the middle.<br>
        3) Repeat until your Reservation Request has all the items you need.<br>
        4) Finish your reservation by clicking "Complete Reservation".
      </p>
    </div>

    <div class="col-lg-4 box">
      <div class="inbox">
        <h3>Choose Equipment</h3>
        <iframe style="border:0" src="grantCatagory.php" width="90%" height="85%"></iframe>
      </div>
    </div>
    <div class="col-lg-4 box" >
      <div class="inbox" align="center">
        <h3>Choose Dates</h3>
        <strong>Start Date:</strong>
        <div id="STARTdatepicker" align="center"></div><br><br>
        <strong>End Date:</strong>
        <div id="ENDdatepicker" align="center"></div>
      </div>

    </div>
    <div class="col-lg-4 box">
      <div class="inbox">
        <h3>Reservation Request</h3>
        <table class="table table-responsive" style="text-align: left;">
          <tbody>

            <tr>
              <td>Equipment Tag:</td>
              <td>XXXXX</td>
            </tr>

            <tr>
              <td>Loan Item:</td>
              <td>XXXXX</td>
            </tr>

            <tr>
              <td>Start Date:</td>
              <td><input type="text" name="STARTdatepicker" value="" ></div></td>
            </tr>

            <tr>
              <td>Time:</td>
              <td><input class="STARTtimepicker" type="text" class="time ui-timepicker-input" autocomplete="off"></td>
            </tr>

            <tr>
              <td>End Date:</td>
              <td><input type="text" name="ENDdatepicker" value="" ></div></td>
            </tr>

            <tr>
              <td>Time:</td>
              <td><input class="ENDtimepicker" type="text" class="time ui-timepicker-input" autocomplete="off"></td>
            </tr>

          </tbody>
        </table>

      </div>
    </div>
  </div>

  <button type="button" class="btn btn-primary" name="button" style="width:96%">COMPLETE RESERVATION</button>

</div>

<script>
$(function(){
  $('#STARTdatepicker').datepicker({
    onSelect: function(dateText, inst) {
      $("input[name='STARTdatepicker']").val(dateText);
    }
  });
});

$(function(){
  $('#ENDdatepicker').datepicker({
    onSelect: function(dateText, inst) {
      $("input[name='ENDdatepicker']").val(dateText);
    }
  });
});

$(document).ready(function(){
  $('input.STARTtimepicker').timepicker({});
});

$(document).ready(function(){
  $('input.ENDtimepicker').timepicker({});
});
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<?php include'footer.php' ?>
