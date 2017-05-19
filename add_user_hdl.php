<?php 
include('db/conn_mysql.php');
if (isset($_POST['submit'])) 
{
	$first_name = sanitized_data($_POST['txt_first_name']);
	$last_name = sanitized_data($_POST['txt_last_name']);
	$user_name = sanitized_data($_POST['txt_user_name']);
	$job_title = sanitized_data($_POST['txt_user_job_title']);
	$badge_num = sanitized_data($_POST['txt_user_badge']);
	$roster_name = sanitized_data($_POST['txt_user_roster']);
	$department = sanitized_data($_POST['txt_user_department']);

	$query = "INSERT INTO userinfo (first_name,last_name,user_name,job_title,department,badge_number,roster,
									date_created,time_created) 
				VALUES ('".$first_name."','".$last_name."','".$user_name."','".$job_title."','".$department."','".$badge_num."','".$roster_name."','".date("y-m-d")."','".date("H:i:s")."')";
	
	if(mysql_query($query,$conn))
	{
		header('location:add_user.php?status_add=1');
	}
	else
	{
		echo "Error while adding roster".mysql_error();
		exit;
	}
}