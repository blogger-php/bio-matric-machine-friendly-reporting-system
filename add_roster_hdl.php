<?php 
include('db/conn_mysql.php');
if (isset($_POST['submit'])) 
{
	$groupname = sanitized_data($_POST['txt_group_name']);
	$time_in = sanitized_data($_POST['txt_time_in']);
	$time_out = sanitized_data($_POST['txt_time_out']);
	$checkbox = sanitized_data(implode(',', $_POST['checkbox']));
	
	$query = "INSERT INTO roster (name,time_in,time_out,days,date_created,time_created) 
				VALUES ('".$groupname."','".$time_in."','".$time_out."','".$checkbox."',
				'".date("y-m-d")."','".date("H:i:s")."' )";
	
	if(mysql_query($query,$conn))
	{
		header('location:add_roster.php?status=1');
	}
	else
	{
		echo "Error while adding roster ".mysql_error();
		exit;
	}
	//print_r($result);exit;
	// $result = odbc_exec($conn, $query);
	// if (!$result) 
	// {
	// 	echo "Error Has been occur";
	// }
	// $last_id =  "SELECT @@IDENTITY FROM Roster";
	// $result = odbc_exec($conn, $last_id);

 //    if($result) 
 //    {
 //    	$val = array_values(odbc_fetch_array($result));
 //    	$roster_id = $val[0] ;

 //    	header('location:view_roster.php?roster_id='.$roster_id);
 //    } 
 //    else 
 //    {
 //        echo "No Last insert ID";
 //    }
	// odbc_close($conn);
}