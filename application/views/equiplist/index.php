<div class="container" style="width: 85%">
    <h1><?php echo $title; ?></h1>
    <table id="list" class="table table-responsive table-striped table-hover" align="center">
      <thead>
        <tr>
          <th>Actions</th>
          <th>EquipmentRecordID</th>
          <th>EquipmentTag</th>
          <th>Name</th>
          <th>SerialNo</th>
          <th>Category</th>
          <th>Quantity</th>
          <th>EquipmentProgram</th>
          <th>LoanDuration</th>
          <th>AuthorizationReq</th>
          <th>EquipmentVisible</th>
          <th>Notes</th>
          <th>ImagePath</th>
        </tr>
      </thead>
      <tbody> 
        <?php 
        foreach ($equipments as $equipment){
         echo '<tr>';
         echo '<td>';
         echo "<button class='btn btn-warning' style='width:70px' onclick=\"window.location.href='editEquipment?equipmentID=" . $equipment['EquipmentRecordID'] . "'\">Edit</a></button>";
         echo '<button class="btn btn-danger" style="margin-top:5px; width:70px" onclick=confirmDelete(' . $equipment['EquipmentRecordID']. ')>Delete</a> </button>';
         echo '</td>';
         echo '<td>'. $equipment['EquipmentRecordID'] . '</td>';
         echo '<td>'. $equipment['EquipmentTag'] . '</td>';
         echo '<td>'. $equipment['Name'] . '</td>';
         echo '<td>'. $equipment['SerialNo'] . '</td>';
         echo '<td>'. $equipment['Category'] . '</td>';
         echo '<td>'. $equipment['Quantity'] . '</td>';
         echo '<td>'. $equipment['EquipmentProgram'] . '</td>';
         echo '<td>'. $equipment['LoanDuration'] . '</td>';
         echo '<td>'. $equipment['AuthorizationReq'] . '</td>';
         echo '<td>'. $equipment['EquipmentVisible'] . '</td>';
         echo '<td>'. $equipment['Notes'] . '</td>';
         echo '<td>'. $equipment['ImagePath'] . '</td>';			
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
  
  function confirmDelete(id){
   var con = confirm("Are you sure you want to delete this equipment?")
   if (con == true){
    window.location.href= "deleteEquipment?del=" + id
  }
}
</script>