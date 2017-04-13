

<?php

    if(isset($_FILES['file']) && isset($_POST['submitButton'])){
        echo '<script>';
        echo 'window.location.href = "AddUsers"';//Go back to upload file page
        echo '</script>';
	}

?>




<div class="container" >
<div class="col-lg-6 col-lg-offset-8"></div>
<h2><?php echo $title ?></h2>
    <form method="POST" enctype="multipart/form-data"><br>
        Select File: <input type="file" name="file" /><br>
        <input type="submit" name="submitButton" id="submitButton" class="btn btn-primary" value="Upload File" />
    </form>
</div>
