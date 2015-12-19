<?php
	session_start();
	error_reporting(E_ALL); // To see all errors
	require 'connToMySQL.php';

	$username = $_POST["field1"];
	$password = $_POST["field2"];

	# MAKE CHECK ON DATA HERE
	if ( (preg_match('/[^A-Za-z]/', $username)) || (preg_match('/[^A-Za-z0-9]/', $password)) ) { 
		# if bad input
		header('location:login_page.php?error=hacker');
		exit;
	} else {
		# good input
		$MySQLObj = new MySQL_Handler();
		$MySQLObj->mysql_connect();
		$result = $MySQLObj->selectFromDB("count(1)", "Users", "username="."'".$username."'"." AND password="."'".$password."'");
		$boolean = $result->fetch_row()[0];
		$MySQLObj->mysql_close();
		if ($boolean == 1) {
			# correct password
			$_SESSION["logged_in"] = true;
			$_SESSION["username"] = $username;
			header('location:index.php');
			exit;
		} else {
			# wrong password
			header('location:login_page.php?error=pwd_fail');
			exit;
		}
	}
?>