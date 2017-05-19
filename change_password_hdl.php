<?php
	require 'db/conn_mysql.php';
	require 'function.php';
	check_session(); 

	$current_password = $_POST['current_password'];
	$new_password = $_POST['new_password'];
	//echo $current_password;exit;
    $query = "SELECT * FROM users WHERE id=".$_SESSION['user_id'];
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);

    if( $row['password'] == $current_password ) 
    {
    	$update_sql="UPDATE users SET password='".$new_password."',update_date='".date("y-m-d")."',update_time='".date("H:i:s")."' WHERE id='".$_SESSION['user_id']."' ";

		$result = mysql_query($update_sql);
		if($result)
		{
			echo "success";
		}
    }
    else 
    {
    	echo "Incorrect password.";
    	exit;
    }