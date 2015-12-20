<?php 
	session_start();
	if  (!isset($_SESSION['username'])) {
    	$_SESSION["logged_in"] = false;
    	$_SESSION["username"] = "";
	}
	# var_dump($_SESSION);
?>