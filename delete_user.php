<?php
require 'db/conn_mysql.php';

$user_id = $_REQUEST['user_id'];

if (isset($user_id)) 
{
	$query = "DELETE FROM userinfo WHERE user_id=".$user_id;
	$result = mysql_query($query,$conn);
	
	if($result) 
	{
		header('location:view_users.php?delete_user='.$user_id);
		exit;
	}
	else
	{
		echo "Record not deleted!".mysql_error();
		die();
	}
}