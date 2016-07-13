<?php
	require 'session.php';
	if (isset($_SESSION["logged_in"])) {
		if ($_SESSION["logged_in"] == true) {

			$_SESSION["logged_in"] = false;
	    	$_SESSION["username"] = "";
	    	$_SESSION["user_type"] = 99999999;
	    	$_SESSION["user_id"] = "XXXXXXX";

	    	unset($_SESSION["firstname"]);
			unset($_SESSION["lastname"]);
			unset($_SESSION["pic_path"]);
			unset($_SESSION["about"]);
			header('location:index.php');
		}
	}
?>