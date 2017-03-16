<html>
<head>

	<style type="text/css">
		.buttons button{
		    display: inline-block;
		    width:   100px;
		    float:   left;
		    clear:   left;
		}
	</style>

<body>

    <div id="container" class="buttons">
		<button id="searchUsersButton" class="buttons" >Search Users</button>
		<button id="editUsersButton"   class="buttons" >Edit Users</button>
		<button id="addUsersButton"    class="buttons" >Add Users</button>
	</div>

</body>

<script type="text/javascript">
    document.getElementById("searchUsersButton").onclick = function (){
        location.href = "SearchUsers.php";
    };

    document.getElementById("editUsersButton").onclick = function (){
        location.href = "EditUsers.php";
    };

    document.getElementById("addUsersButton").onclick = function (){
        location.href = "AddUsers.php";
    };
</script>