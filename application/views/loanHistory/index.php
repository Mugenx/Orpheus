<div class="container" style="width: 85%">
  <h1><?php echo $title; ?></h1>
  <table id="list" class="table table-responsive table-striped table-hover" align="center" >
    <thead>
      <tr>
        <th>Loaned Out ID</th>
        <th>Equipment Record ID</th>
        <th>Student Number</th>
        <th>Loaned Date</th>
        <th>Returned Date</th>
      </tr>
    </thead>
    <tbody> 
      <?php 
      foreach ($history as $data){
       echo '<tr>';
       echo '<td>'. $data['LoanHistoryID'] . '</td>';
       echo '<td>'. $data['EquipmentRecordID'] . '</td>';
       echo '<td>'. $data['StudentNumber'] . '</td>';
       echo '<td>'. $data['LoanedDate'] . '</td>';
       echo '<td>'. $data['ReturnedDate'] . '</td>';
       echo '</tr>';
     }
     ?>
   </tbody>
 </table> <!-- end of table -->
</div> <!-- end of container -->

<script type="text/javascript">
  $(document).ready(function() {
    $('#list').DataTable( {
      dom: 'lBfrtip', // elements, in order
      buttons: [  // exports buttons
      'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      "pageLength": 25 // define entities per page
    } );
  } );
</script>

