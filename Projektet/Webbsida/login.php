<?php
	ob_start();
	error_reporting(E_ALL); // To see all errors
	require 'connToMySQL.php';

	$username = strtolower($_POST["field1"]);
	$password = $_POST["field2"];

	# MAKE CHECK ON DATA HERE
	if ( (preg_match('/[^A-Za-z]/', $username)) || (preg_match('/[^A-Za-z0-9]/', $password)) ) { 
		# if bad input
		header('location:login_page.php?error=hacker');
		exit();
	} else {
		# good input
		$MySQLObj = new MySQL_Handler();
		$MySQLObj->mysql_connect();
		$result = $MySQLObj->selectFromDB("COUNT(1)", "Users", "username="."'".$username."'"." AND password="."'".$password."'");
		$boolean = $result->fetch_row();
		$boolean = $boolean[0];
		
		if ($boolean == 1) {
			# correct password
			require 'session.php';

			
			# TILLÅTS INTE
			# $_SESSION["MySQLObj"] = $MySQLObj;
			

			$_SESSION["logged_in"] = true;
			$_SESSION["username"] = $username;

			$result = $MySQLObj->selectFromDB("user_id, firstname, lastname, pic_name, user_type, about", "Users", "username="."'".$username."'");
			$dict = $result->fetch_assoc();
			
			$_SESSION["user_id"] = $dict["user_id"];
			$_SESSION["firstname"] = $dict["firstname"];
			$_SESSION["lastname"] = $dict["lastname"];
			$_SESSION["pic_path"] = $dict["pic_name"];
			$_SESSION["about"] = $dict["about"];

			# HANTERA DESSA. 
			# 1 = Student
			# 2 = Teacher
			# 3 = Examinator
			# 4 = Course admin
			# 0 = System admin
			
			$_SESSION["user_type"] = $dict["user_type"];

			$MySQLObj->mysql_close();
			header('location:index.php');
			exit();
		} else {
			# wrong password
			$MySQLObj->mysql_close();
			header('location:login_page.php?error=pwd_fail');
			exit();
		}
	}
?>









