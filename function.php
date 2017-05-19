<?php

session_start();

function check_session()
{
	if(isset($_SESSION["user_id"]))
	{
		//header('location:dashboard.php');
	}
	if(empty($_SESSION["user_id"]) || (!isset($_SESSION['user_id'])))
	{
		header('location:index.php');
		exit;
	}

}

function resolve_department_name_by_id ($id) 
{
	$query_department_name = "SELECT name FROM departments WHERE id='".$id."'";
	$result_department_name = mysql_query($query_department_name);
	$row_department_name = mysql_fetch_array($result_department_name);
	$name = ucwords($row_department_name["name"]);
	return $name;
}

function get_ip_address() 
{
	$ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 
	                  'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR',
	                  'HTTP_FORWARDED', 'REMOTE_ADDR');
	foreach ($ip_keys as $key) {
	    if (array_key_exists($key, $_SERVER) === true) {
	        foreach (explode(',', $_SERVER[$key]) as $ip) {
	            // trim for safety measures
	            $ip = trim($ip);
	            // attempt to validate IP
	            if (validate_ip($ip)) {
	                return $ip;
	            }
	        }
	    }
	}
	return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}

function validate_ip($ip)
{
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}