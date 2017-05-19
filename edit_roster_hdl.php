<?php
include('db/conn_mysql.php');

$id = sanitized_data($_REQUEST['roster_id']);
$groupname = sanitized_data($_POST['txt_group_name']);
$time_in = sanitized_data($_POST['txt_time_in']);
$time_out = sanitized_data($_POST['txt_time_out']);
$checkbox = sanitized_data(implode(',', $_POST['checkbox']));

$query = "UPDATE roster SET 
			name='".$groupname."',
			time_in='".$time_in."',
			time_out='".$time_out."',
			days='".$checkbox."',
			date_created='".date("y-m-d")."',
			time_created='".date("H:i:s")."'
			WHERE id=".$id."
			";
//echo $query;
$result = mysql_query($query,$conn);
if ($result) 
{
	header('location:view_rosters.php?update_id='.$id);
	exit;
}
else
{
	echo "REcord not updated!".mysql_error();
	exit;
}
