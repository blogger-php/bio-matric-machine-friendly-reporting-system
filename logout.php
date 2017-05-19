<?php
require 'function.php';
check_session();
$destro = session_destroy();
if ($destro) 
{
	header('location:index.php');
	exit;
}