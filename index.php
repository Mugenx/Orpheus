<?php include'header.php' ?>

<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#">Loan List</a></li>
    <li><a href="#">Menu 1</a></li>
    <li><a href="#">Menu 2</a></li>
    <li><a href="#">Menu 3</a></li>
  </ul>
  <div id="loan" class="table-responsive wrapper" style="border-top:0;">
    <form class="" action="index.php" method="post">
      <table id="loanList" class="table table-striped table-hover" >
        <tbody>
          <th>ID</th>
          <th>User</th>
          <th>Name</th>
          <th>StartDate</th>
          <th>Time</th>
          <th>EndDate</th>
          <th>Time</th>
          <th>Approved</th>
          <!-- 1 -->
          <tr id="1">
            <td>1</td>
            <td>Guobin</td>
            <td>Canon EOS Rebel #3 -retired</td>
            <td>2017-01-01</td>
            <td>9:00</td>
            <td>2017-01-01</td>
            <td>18:00</td>
            <td class="tdApproved"><span class="glyphicon glyphicon-ok"></span></td>
          </tr>
          <!-- 2 -->
          <tr>
            <td>2</td>
            <td>Eric</td>
            <td>Handycam Sony Hi8 #1</td>
            <td>2017-01-01</td>
            <td>9:00</td>
            <td>2017-01-01</td>
            <td>18:00</td>
            <td class="tdApproved"><span class="glyphicon glyphicon-ok"></span></td>
          </tr>
          <!-- 3 -->
          <tr>
            <td>3</td>
            <td>Robert</td>
            <td>Light Reflector: Wescott Medium #05</td>
            <td>2017-01-01</td>
            <td>9:00</td>
            <td>2017-01-01</td>
            <td>18:00</td>
            <td class="tdApproved"><span class="glyphicon glyphicon-ok"></span></td>
          </tr>
          <!-- 4 -->
          <tr>
            <td>4</td>
            <td>Kenny</td>
            <td>Pro. Manfrotto #02</td>
            <td>2017-01-01</td>
            <td>9:00</td>
            <td>2017-01-01</td>
            <td>18:00</td>
            <td class="tdApproved"><span class="glyphicon glyphicon-ok"></span></td>
          </tr>
          <!-- 4 -->
          <tr>
            <td>5</td>
            <td>Nirav</td>
            <td>Panoramic VR Tripod Head # 01</td>
            <td>2017-01-01</td>
            <td>9:00</td>
            <td>2017-01-01</td>
            <td>18:00</td>
            <td class="tdApproved"><span class="glyphicon glyphicon-ok"></span></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>



<script type="text/javascript">
$(document).ready(function(){
  $('table tr').click(function(){
    $(this).attr('href',"loanDetail.php");
    window.location = $(this).attr('href');
    return false;
  });
});
</script>


<?php include'footer.php' ?>
