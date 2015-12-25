<?php 
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	if  (!isset($_SESSION['username'])) {
    	$_SESSION["logged_in"] = false;
    	$_SESSION["username"] = "";
    	$_SESSION["user_type"] = 99999999;
    	$_SESSION["user_id"] = "XXXXXXX";
	}
	# var_dump($_SESSION);
?>