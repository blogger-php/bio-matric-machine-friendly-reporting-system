<?php

require 'db/conn_mysql.php';
require 'function.php';
check_session();

if (isset($_POST['submit'])) 
{
	$family_id = $_POST['family_id'];
	$rosters = $_POST['checkbox'];
	//echo "<pre>";print_r($rosters);exit();

	$selete_query = "SELECT * FROM assign_roster_family WHERE roster_family_id=".$family_id;
	$selete_result = mysql_query($selete_query);

	if(mysql_num_rows($selete_result) > 0) 
	{
		$del_query = "DELETE FROM assign_roster_family WHERE roster_family_id=".$family_id;
		mysql_query($del_query);
		foreach($rosters as $val)
		{
			$roster_id = $val;
			
			$query = "INSERT INTO assign_roster_family (roster_family_id,roster_id,
						date_created,time_created) VALUES ('".$family_id."','".$roster_id."','".date("y-m-d")."','".date("H:i:s")."')";
			$result = mysql_query($query);
		}	
		header('location:view_roster_family.php?id='.$id);
	}
	else
	{
		foreach($rosters as $val)
		{
			$roster_id = $val;
			
			$query = "INSERT INTO assign_roster_family (roster_family_id,roster_id,
						date_created,time_created) VALUES ('".$family_id."','".$roster_id."',
						'".date("y-m-d")."','".date("H:i:s")."')";
			$result = mysql_query($query);
		}	
		header('location:view_roster_family.php?id='.$id);
	}
	
}