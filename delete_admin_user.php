<?php
	include('db/conn_mysql.php');

	$id = $_REQUEST['user_id'];

	$query = "DELETE FROM users WHERE id=".$id;

	$result = mysql_query($query);
	if ($result) 
	{
		$result = mysql_query($query);
		if ($result) 
		{
			header('location:view_admin_user.php?delete_user='.$id);
			exit;
		}	
	}
?>