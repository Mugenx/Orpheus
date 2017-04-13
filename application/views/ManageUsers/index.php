<div class="container" align="center">
	<div class="col-lg-12">
		<h1><?php echo $title ?></h1><br>
		<button id="searchUsersButton" class="btn btn-warning" >Search Users</button>
		<button id="addUsersButton"    class="btn btn-primary" >Add Users</button>
		<button id="disableAllButton"  class="btn btn-danger" onclick="disableUsersConfirm();">Disable All Users</button>
	</div>
</div>



<script type="text/javascript">
	document.getElementById("searchUsersButton").onclick = function (){
		location.href = "SearchUsers";
	};

	document.getElementById("addUsersButton").onclick = function (){
		location.href = "AddUsers";
	};

	function disableUsersConfirm(){
    	var con = confirm("Are you sure you want to disable all users? (Admins will not be affected)");
        if (con == true){
            window.location.href= "DisableAllUsers";
        }
    }
</script>