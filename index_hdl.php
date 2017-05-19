<?php

require 'db/conn_mysql.php';
require 'function.php';

if (isset($_POST['submit'])) 
{
	$name = sanitized_data($_POST['txt_username']);
	$password =  sanitized_data($_POST['txt_password']);
	$remember_password =  sanitized_data(isset($_POST['remember']));

	$query = "SELECT * FROM users WHERE username='".$name."' AND password='".$password."'";
	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0 ) 
	{
		$row = mysql_fetch_array($result);

		if($row)
		{
			if(!empty($_POST["remember"]))
			{
				// $encrpt_ip = get_ip_address();
				// $encrpt_name = md5(sha1($name . 'name'));
				// $encrpt_password = md5(sha1($password . 'password'));

				setcookie ("user_ip", get_ip_address(), time() + (10 * 365 * 24 ));
				setcookie ("user_name", $name, time() + (10 * 365 * 24 ));
				setcookie ("password", $password, time() + (10 * 365 * 24 ));
			}
			else
			{
			 	if(isset($_COOKIE["user_name"]))
				{
					setcookie ("user_name", "");
				}
				if(isset($_COOKIE["password"]))
				{
					setcookie ("password", "");
				}
			}
			header("Location:dashboard.php");
		}

		$id = $row['id'];
		$_SESSION["user_id"] = $row['id'];
		$_SESSION["user_name"] = $row['name'];
		$_SESSION["user_image"] = $row['image'];
		$_SESSION["account_type"] = $row['account_type'];
		$_SESSION["firstname"] = $row['firstname'];
		$_SESSION["lastname"] = $row['lastname'];
		$_SESSION["designation"] = $row['designation'];
		$_SESSION["department"] = $row['department'];
		print_r($_SESSION["department"]);exit;
	}
	else
	{
		header("location:index.php?wrong_credentials");
		exit;
	}
}
