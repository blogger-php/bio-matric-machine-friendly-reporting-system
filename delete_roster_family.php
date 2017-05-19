<?php
	include('db/conn_mysql.php');

	$id = $_REQUEST['roster_family_id'];

	$query = "DELETE FROM roster_family WHERE id=".$id;

	$result = mysql_query($query);
	if ($result) 
	{
		$result = mysql_query($query);
		if ($result) 
		{
			header('location:view_roster_family.php?delete_id='.$id);
			exit;
		}	
	}
?>