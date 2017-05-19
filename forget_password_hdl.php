<?php
	require 'db/conn_mysql.php';
	require 'function.php';
	require 'vendor/autoload.php';
	use Mailgun\Mailgun;

	ini_set("memory_limit", "16M");
	set_time_limit(0);
	if(isset($_POST["email_address"]) && strlen($_POST["email_address"])>0)
	{
		$email_address = sanitized_data($_POST["email_address"]);
	}

	$query = "SELECT * FROM users WHERE email_address='".$email_address."'";
	$result_query = mysql_query($query);
	if (mysql_num_rows($result_query) > 0) 
	{	
		$row = mysql_fetch_array($result_query);
		$user_password = $row["password"];
		$email_address = $row["email_address"];
		$key = "key-4747815bfe92288bb0eacc5f5f2854b5";
		
		$domain = "sandbox1c04cc60ef6f4e908766377bcf83335d.mailgun.org";

		# Make the call to the client.
		$email_message = "Dear ".$email_address.",
				Thankyou for choosing our application.
				Your login information is:
				Email: ".$email_address."
				Password: ".$user_password."";
				$from = "postmaster@sandbox1c04cc60ef6f4e908766377bcf83335d.mailgun.org";
				$txt_femail = "info@attendance.com";
				$txt_subject = "Password Recovery For Attendance System";
				$mgClient = new Mailgun($key);
				$file_array = array();
				$result = $mgClient->sendMessage($domain, array(
						'from'    => ''.$from.' <'.$txt_femail.'>',
						'to'      => ''.$email_address.'',
						'subject' => ''.$txt_subject.'',
						'html'    => '<html><body>'.$email_message.'</body></html>'
					),$file_array);
					//Mail To User End//
					$msg_type = "alert-success";
					$msg = "Email Sent at ". $email_address;
		if ($result) 
		{
			header('Location:index.php?password_send=1');
			exit;
		} 
		else 
		{
			echo "Email address is not given!!";
		}
	}

?>