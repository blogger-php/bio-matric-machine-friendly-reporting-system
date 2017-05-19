<?php
include('db/conn_mysql.php');

$id = sanitized_data($_REQUEST['id']);
$family_name = sanitized_data($_POST['roster_family_name']);
$days = sanitized_data($_POST['days']);

$query = "UPDATE roster_family SET 
			family_name='".$family_name."',
			days='".$days."',date_created='".date("y-m-d")."',time_created='".date("H:i:s")."'
			WHERE id=".$id."
			";
//echo $query;
$result = mysql_query($query,$conn);
if ($result) 
{
	header('location:view_roster_family.php?update_id='.$id);
	exit;
}
else
{
	echo "REcord not updated!".mysql_error();
	exit;
}
