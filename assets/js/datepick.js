$(document).ready(function(){
  $(function(){
    $(".ENDdatepicker2").datepicker();
  });

  $(function(){
    $(".STARTdatepicker2").datepicker({
     beforeShowDay: $.datepicker.noWeekends,
     minDate:0,
     maxDate: "+14D",
     onSelect:function(){
      var date=$(this).datepicker("getDate");
      if (date.getDay() == 5) {
        date.setDate(date.getDate()+3);
      } else {
        date.setDate(date.getDate()+1);
      }

      $(".ENDdatepicker2").datepicker("setDate", date);
    }
  });
  });

});
