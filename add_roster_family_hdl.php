<?php 
include('db/conn_mysql.php');
if (isset($_POST['submit'])) 
{
	$family_name = sanitized_data($_POST['txt_roster_family_name']);
	$days = sanitized_data($_POST['days']);
	
	$query = "INSERT INTO roster_family (family_name,days,date_created,time_created) 
				VALUES ('".$family_name."','".$days."','".date("y-m-d")."','".date("H:i:s")."') ";
	$result = mysql_query($query);
	if($result)
	{
		header('location:view_roster_family.php?status=1');
		exit;
	}
	else
	{
		echo "Error while adding roster ".mysql_error();
		exit;
	}
}