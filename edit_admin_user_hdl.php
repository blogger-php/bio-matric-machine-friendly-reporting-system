<?php
require 'db/conn_mysql.php';
require 'function.php';

	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) 
	{
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) 
	    {
	        //echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } 
	    else 
	    {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }

	    $image_name = basename($_FILES["fileToUpload"]["name"]);
	    $id = $_POST['id'];
		$first_name = $_POST['txt_first_name'];
		$last_name = $_POST['txt_last_name'];
		$username = $_POST['txt_user_name'];
		$designation = $_POST['txt_user_designation'];
		$department = $_POST['txt_user_department'];
		$password = $_POST['txt_user_password'];
		$account_type = $_POST['txt_user_type'];
	}

	// Check if file already exists
	if (file_exists($target_file)) 
	{
	    echo "Sorry, file already exists.<br>";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) 
	{
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if(	$imageFileType != "jpg" && $imageFileType != "png" 
		&& $imageFileType != "jpeg" && $imageFileType != "gif" ) 
	{
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	} 

	else 
	{
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
	    {
	        $query = "UPDATE users SET firstname='".$first_name."',
	        			lastname='".$last_name."',username='".$username."',designation='".$designation."',
	        			department='".$department."',password='".$password."',
	        			account_type='".$account_type."',image='".$image_name."',
	        			update_date='".date("y-m-d")."',update_time='".date("H:i:s")."'
	        			WHERE id='".$id."' ";
	        $result = mysql_query($query);
	        if($result)
	        {
	        	header('Location:view_admin_user.php?edit_user');
	        	exit;
	        }
	        else
	        {
	        	echo "Error: ".mysql_error();
	        }
	    } 
	    else 
	    {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

?>