<?php
include('db/conn_mysql.php');

$id = $_REQUEST['roster_id'];

$query = "SELECT * FROM assign_roster WHERE roster_id='".$id."'";
$result = mysql_query($query);
if(mysql_num_rows($result) > 0 )
{
	//$msg = "Record can not be deletd!Please check assigned users.";
	header("location:view_rosters.php?roster_cannot=".$id);
	exit;
}
else
{
	$query = "DELETE FROM Roster WHERE id=".$id;

	$result = mysql_query($query);
	if ($result) 
	{
		$query = "DELETE FROM assign_roster WHERE roster_id=".$id;

		$result = mysql_query($query);
		if ($result) 
		{
			header('location:view_rosters.php?delete_id='.$id);
			exit;
		}	
	}
}