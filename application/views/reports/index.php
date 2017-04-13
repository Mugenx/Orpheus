<div class="container">
  <h1><?php echo $title; ?></h1>

  <ul style="font-size: 18px">
    <li><a href="overdue">OverDue</a></li>
    <li><a href="loanedOut">Loaned Out</a></li>
    <li><a href="loanHistory">Loan History</a></li>
  </ul>

</div>

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

