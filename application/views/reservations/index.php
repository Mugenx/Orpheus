<div class="container" style="width: 85%">
  <h1><?php echo $title; ?></h1>
  <table id="list" class="table table-responsive table-striped table-hover" align="center" >
    <thead>
      <tr>
        <th>Actions</th>
        <th>ReservationID</th>
        <th>StudentNumber</th>
        <th>EquipmentRecordID</th>
        <th>ReserveStart</th>
        <th>ReserveEnd</th>
      </tr>
    </thead>
    <tbody> 
      <?php 
      foreach ($reservations as $reservation){
        // $t = strtotime($reservation['ReserveStart']);
        // $t2 = strtotime($reservation['ReserveEnd']);
        echo '<tr>';
        echo '<td>';

        $sd =$reservation['ReserveStart'];
        $sd = str_replace('/','',$sd);

        $ed = $reservation['ReserveEnd'];
        $ed = str_replace('/','',$ed);

        echo '<button class="btn btn-warning" style="width:70px" onclick="approve(' . $reservation['ReservationID'] . ',' . $reservation['EquipmentRecordID'] . ',' . $reservation['StudentNumber']
        . ',' . (int)$sd . ',' . (int)$ed .')">Approve</a></button><br>';
        echo '<button class="btn btn-danger" style="margin-top:5px; width:70px" onclick="deny(' . $reservation['ReservationID'] . ')">Deny</a> </button>';
        echo '</td>';
        echo '<td>'. $reservation['ReservationID'] . '</td>';
        echo '<td>'. $reservation['StudentNumber'] . '</td>';
        echo '<td>'. $reservation['EquipmentRecordID'] . '</td>';
        echo '<td>'. $reservation['ReserveStart']. '</td>';
        echo '<td>'. $reservation['ReserveEnd'] . '</td>';
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
      "pageLength": 25, // define entities per page
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
  } );


  function approve(id, equipmentRecordID, studentNumber, reserveStart, reserveEnd){
    
    var reserveStart = reserveStart.toString();
    reserveStart = "0" + reserveStart.slice(0, 1) + "/" + reserveStart.slice(1, 3) + "/" + reserveStart.slice(3, 8);

    var reserveEnd = reserveEnd.toString();
    reserveEnd = "0" + reserveEnd.slice(0, 1) + "/" + reserveEnd.slice(1, 3) + "/" + reserveEnd.slice(3, 8);

    // var con = confirm("Are you sure?\n" + "Start Date: "+reserveStart  +  "\nEnd Date: " +reserveEnd);
    // if (con == true){
     window.location.href= "approve?id=" + id + "&eqpID=" + equipmentRecordID 
     + "&snum=" + studentNumber + "&ldate=" + reserveStart + "&ddate=" + reserveEnd;
   // }
 }

 function deny(id){
   var deniedReason = prompt("Please enter reason for denial", "");
   if (deniedReason != null){
     window.location.href= "deny?id=" + id + "&reason=" + deniedReason;
   }
 }
</script>