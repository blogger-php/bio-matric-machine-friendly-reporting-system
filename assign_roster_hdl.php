<?php

require 'db/conn_mysql.php';

if (isset($_POST['submit'])) 
{
	$roster_id = sanitized_data($_POST['roster_id']);
	$emp_id = sanitized_data($_POST['checkbox']);
	//echo "<pre>";print_r($emp_id);exit();

	$sel_query = "SELECT * FROM assign_roster WHERE roster_id=".$roster_id;
	$sel_result = mysql_query($sel_query);

	if(mysql_num_rows($sel_result) > 0) 
	{
		$del_query = "DELETE FROM assign_roster WHERE roster_id=".$roster_id;
		$sel_result = mysql_query($del_query);
		foreach($emp_id as $val)
		{
			$employee_id = $val;
			
			$query = "INSERT INTO assign_roster (user_id,roster_id,date_created,time_created) VALUES ('".$employee_id."','".$roster_id."','".date("y-m-d")."','".date("H:i:s")."')";
			$result = mysql_query($query);
		}	
		header('location:view_rosters.php?id='.$id);
	}
	else
	{
		foreach($emp_id as $val)
		{
			$employee_id = $val;
			
			$query = "INSERT INTO assign_roster (user_id,roster_id,date_created,time_created) VALUES ('".$employee_id."','".$roster_id."','".date("y-m-d")."','".date("H:i:s")."')";
			$result = mysql_query($query);
		}	
		header('location:view_rosters.php?id='.$id);
	}
	
}