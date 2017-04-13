<div class="container" style="width: 85%">
  <h1><?php echo $title; ?></h1>
  <table id="list" class="table table-responsive table-striped table-hover" align="center" >
    <thead>
      <tr>
        <th>LoanedOutID</th>
        <th>EquipmentRecordID</th>
        <th>StudentNumber</th>
        <th>LoanedDate</th>
        <th>DueDate</th>
        <th>Return</th>
      </tr>
    </thead>
    <tbody> 
      <?php 
      foreach ($loanedout as $loan){
       echo '<tr>';
       echo '<td>'. $loan['LoanedOutID'] . '</td>';
       echo '<td>'. $loan['EquipmentRecordID'] . '</td>';
       echo '<td>'. $loan['StudentNumber'] . '</td>';
       echo '<td>'. $loan['LoanedDate'] . '</td>';
       echo '<td>'. $loan['DueDate'] . '</td>'; 
       echo '<td>';

       $sd =$loan['LoanedDate'];
       $sd = str_replace('/','',$sd);

       $ed = $loan['DueDate'];
       $ed = str_replace('/','',$ed);

       echo '<button class="btn btn-primary" onclick="returnEquipment(' . $loan['LoanedOutID'] . ',' . $loan['EquipmentRecordID'] . ',' . $loan['StudentNumber']
       . ',' . (int)$sd . ',' . (int)$ed .')">Return</a></button>'; 
       echo '</td>';     
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
  
  function returnEquipment(loanedOutID, equipmentRecordID, studentNumber, loanedDate, dueDate){


    var loanedDate = loanedDate.toString();
    loanedDate = "0" + loanedDate.slice(0, 1) + "/" + loanedDate.slice(1, 3) + "/" + loanedDate.slice(3, 8);

    var dueDate = dueDate.toString();
    dueDate = "0" + dueDate.slice(0, 1) + "/" + dueDate.slice(1, 3) + "/" + dueDate.slice(3, 8);


    window.location.href= "returnEquipment?id=" + loanedOutID + "&eqpID=" + equipmentRecordID 
    + "&snum=" + studentNumber + "&ldate=" + loanedDate + "&ddate=" + dueDate;

  };
</script>