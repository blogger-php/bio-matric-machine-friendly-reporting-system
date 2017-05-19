<?php 
include('db/conn_mysql.php');
if (isset($_POST['submit'])) 
{
	$first_name = sanitized_data($_POST['txt_first_name']);
	$last_name = sanitized_data($_POST['txt_last_name']);
	$user_name = sanitized_data($_POST['txt_user_name']);
	$job_title = sanitized_data($_POST['txt_user_job_title']);
	$badge_num = sanitized_data($_POST['txt_user_badge']);
	$roster = sanitized_data($_POST['txt_user_roster']);
	$department = sanitized_data($_POST['txt_user_department']);

	$query = "UPDATE userinfo SET first_name='".$first_name."',last_name='".$last_name."',
				user_name='".$user_name."',job_title='".$job_title."',badge_number='".$badge_num."',
				roster='".$roster."',department='".$department."'
				WHERE user_id='".$_POST['user_id']."'";

	$query_assign_roster = "UPDATE assign_roster SET roster_id='".$roster."' 
							WHERE user_id='".$_POST['user_id']."'";

	$result = mysql_query($query,$conn);
	$result_assign_roster = mysql_query($query_assign_roster);

	if($result && $query_assign_roster)
	{
		header('location:view_users.php?edit_user='.$_POST['user_id']);
		exit;
	}
	else
	{
		echo "Error while adding roster".mysql_error();
		exit;
	}
}