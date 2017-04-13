<div class="container" align="center">
  <div class="col-lg-12">
    <div  style="text-align: left; font-size: 18px; margin-left:10px">
      <h1><?php echo $title ?></h1>
      <p>
        1) Find an item by selecting it from the categories.<br>
        2) Choose a loan start date. Please follow the guidelines.<br>
        3) Default end date is the next date. If the start date is Friday, end date will be next Monday.<br>
        4) Time is fixed. Start time is <strong>3:00 PM</strong> and end time is <strong>10:00 AM</strong>.<br>
        5) Reservation records table is located at the bottom.
      </p>
    </div>

    <div class="col-lg-12 box">
      <div class="inbox" style="padding-left:10px">
        <h2>Choose Equipment</h2>
        <div style="overflow:scroll; overflow-x: hidden; height:520px;">
          <?php
          echo '<table id="equiplist" class="table table-responsive table-hover"
          style="text-align:left; width: 30vw" align="center">';
          foreach($equipmentPrograms as $item){
            $equipmentProgram = $item['EquipmentProgram'];
            echo '<tr>';
            echo '<td>';
            echo '<span style="font-size:16px">'.$equipmentProgram.'</span>';
            
            $equipments = $this->loan_model->get_equipmentName($equipmentProgram);
            foreach ($equipments as $key) {
              echo '<ul class="list-group" style="margin-top:10px; text-align: center; font-size: 20px">';
              echo '<li class="list-group-item">'.$key['Name'].'<br><img src="'.asset_url().'img/'.$key['ImagePath'].'" width="150px"></li>';
              echo "</ul>";
            }
            echo '</td>';
            echo '</tr>';
          }
          echo '</table>';
          ?>
        </div>
      </div>
    </div>

    <div class="col-lg-12 box" style="height: auto; " >
      <div class="inbox" align="center" style="padding-bottom: 30px">
        <h2>Reservation Request</h2>
        
        <form action="<?php echo base_url('loan/save') ?>" method="post" accept-charset="utf-8">
          <table class="table table-responsive" style="text-align: left; width: 30vw" align="center">
            <tbody>
              <tr>
                <td><strong>Equip Name:</strong></td>
                <td><input id="itemName" name="itemName" type="text" value="" style=""></td>
              </tr>

              <tr>
                <td><strong>Start Date:</strong></td>
                <td><input id="startDate" name="startDate"  type="text" class="form-control STARTdatepicker startDate"></td>
                <td><input id="endDate" name="endDate"  type="text" class="form-control ENDdatepicker endDate" style="background-color:#eee; display: none"></td>
              </tr>
            </tbody>
          </table>

          <button id="add" class="btn btn-primary"
          name="button" style="margin-top:-20px; width:30vw;height:30px">ADD THIS EQUIPMENT</button><br>
          <button type="reset" value="Reset" class="btn btn-primary"
          name="button" style="background-color:#e74c3c; border-color:#e74c3c; width:30vw;height:30px">RESET</button>
        </form>
      </div>
    </div>

    <div class="col-lg-12 box"  align="left" style=" margin-bottom: 200px" >
      <div class="inbox"  style="height: auto; padding:0 25px 25px 25px;">
        <div style="text-align: center; margin-bottom: 30px"><h2>Reservation Records</h2></div>
        <!-- <div style="overflow:scroll; overflow-x: hidden; height:520px" > -->
        <div>

          <?php 
          if (!$requests) {
              # code...
            echo '<div align="center"><h1>No Records</h1></div>';
          } else {
            echo '<table id="list" class="table table-responsive table-hover" style="text-align: left">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Equipment Name</th>';
            echo '<th>EquipmentRecordID</th>';
            echo '<th>Start Date</th>';
            echo '<th>End Date</th>';
            echo '<th>Submit Date</th>';
            echo '<th>Status</th>';
            echo '<th>Update</th>';
            echo '<th>Delete</th>';
            echo '</tr>';
            echo '</thead>';
            foreach ($requests as $item) {
              # code...
              echo '<tr>';
              $name = $this->loan_model->get_name($item['EquipmentRecordID']);
              $rid = $item['ReservationID'];
              $id = $item['EquipmentRecordID'];

              echo '<td>'. $name .'</td>';
              echo '<td>'. $id .'</td>';
              echo '<td>'. $item['ReserveStart'] .'</td>';
              echo '<td>'. $item['ReserveEnd'] .'</td>';
              $SubmitDate = strtotime($item['SubmitDate']);
              echo '<td>'. date('m/d/Y',$SubmitDate) .'</td>';

              if ($item['Approved']) {
                $status = "<span class='glyphicon glyphicon-ok' style='color:#1abc9c'></span>";
              } elseif ($item['Denied']){
                $status = "<span class='glyphicon glyphicon-remove'style='color:#e74c3c'></span>";
              } else {
                $status = "Pending";
              }
              echo '<td>'. $status .'</td>';

              
              echo '<td><button id="'.$rid.'" name="'.$name.'" type="button" class="btn edit" style="background-color:transparent; margin-top:-6px" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></td>';
              echo '<td><button id="'.$rid.'" name="'.$name.'" type="button" class="btn delete" style="background-color:transparent; margin-top:-6px" data-toggle="modal" data-target="#confirmDelete"><span class="glyphicon glyphicon-trash"></span></button></td>';
              echo '</tr>';
            }
            echo '</table>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /.confirm delete modal -->
<div  id="confirmDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top:40vh">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Confirm Delete Reservation</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 fetched-data"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary cdelete" data-dismiss="modal" >Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>  
  $(document).ready(function(){
    $('.delete').click(function(){  
      var id = $(this).attr('id');
      var name = $(this).attr('name');
      $.ajax({  
        url:"<?php echo base_url('loan/delete/') ?>"+id,
        method:"post",
        data:{
          name: name
        },  
        success:function(data){  
         $('.fetched-data').html(data);
         $('.cdelete').attr('name', id );  
       }  
     });  
    });  
  }); 


  $(document).ready(function(){
    $('.cdelete').click(function(){  
      var id = $(this).attr('name');
      $.ajax({  
        url:"<?php echo base_url('loan/cdelete/') ?>"+id,
        method:"post",
        success:function(){  
          location.reload();
        }  
      });  
    });  
  }); 

</script>

<!-- /.edit request modal -->
<div  id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top:40vh">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Edit Request</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table editRequest "></table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update" data-dismiss="modal">Update</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>  
 $(document).ready(function(){
  $('.edit').click(function(){  
    var id = $(this).attr('id');
    var name = $(this).attr('name');
    $.ajax({  
      url:"<?php echo base_url('loan/edit/') ?>"+id,
      method:"post",
      data:{
        name: name
      },  
      success:function(data){  
       $('.editRequest').html(data);
       $('.update').attr('id', id );  
     }  
   });  
  });  
});  

 $(document).ready(function(){
  $('.update').click(function(){  
    var id= $(this).attr('id');
    console.log(id);
    var startDate = $('#startDate2').val();
    console.log(startDate);
    var endDate= $('#endDate2').val();
    console.log(endDate);
    $.ajax({  
      url:"<?php echo base_url('loan/update/') ?>"+ id,
      method:"post",
      data:{startDate:startDate, endDate:endDate},
      dataType: "text",
      success:function(){  
        location.reload();
      }  
    });  
  });  
}); 
</script>


<script type="text/javascript">
  $(function(){
    $("table ul").hide();
    $("table td").click(function(){
      $(this).find("ul").slideToggle(200);
    });
  });

  $(function(){
    $("#equiplist li").click(function(){
      var itemName = $(this).text();
      document.getElementById("itemName").value = itemName;
    });
  });

  $(document).ready(function(){
    $(function(){
      $(".ENDdatepicker").datepicker();
    });
  });

  $(document).ready(function(){
    $(function(){
      $(".STARTdatepicker").datepicker({
       beforeShowDay: $.datepicker.noWeekends,
       minDate:0,
       maxDate: "+14D",
       onSelect:function(){
        var date=$(this).datepicker('getDate');
        if (date.getDay() == 5) {
          date.setDate(date.getDate()+3);
        } else {
          date.setDate(date.getDate()+1);
        }

        $(".ENDdatepicker").datepicker("setDate", date);
      }
    });
    });
  });  

  $(document).ready(function() {
    $('#list').DataTable( {
      "order": [[ 4, "asc" ]],
      // "pageLength": 25 // define entities per page
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
  } );

</script>




