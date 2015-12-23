<?php
	ob_start();
	error_reporting(E_ALL); // To see all errors
	require 'connToMySQL.php';
	require 'input_data_checker.php';

	$username = strtolower($_POST["field1"]);
	$password = $_POST["field2"];

	# good input
	$MySQLObj = new MySQL_Handler();
	$MySQLObj->mysql_connect();
	$MySQLstatement = $MySQLObj->conn->prepare("SELECT COUNT(1) FROM Users WHERE username=? AND password=?");
	$MySQLstatement->bind_param("ss", $username, $password);
	$state = $MySQLstatement->execute();
	$result = $MySQLstatement->get_result();
	$MySQLstatement->close();

	$boolean = $result->fetch_row();
	$boolean = $boolean[0];
	
	if ($boolean == 1) {
		# correct password
		require 'session.php';

		
		# TILLÅTS INTE
		# $_SESSION["MySQLObj"] = $MySQLObj;
		

		$_SESSION["logged_in"] = true;
		$_SESSION["username"] = $username;

		$MySQLstatement = $MySQLObj->conn->prepare("SELECT user_id, firstname, lastname, pic_name, user_type, about FROM Users WHERE username=? AND password=?");
		$MySQLstatement->bind_param("ss", $username, $password);
		$state = $MySQLstatement->execute();
		$result = $MySQLstatement->get_result();
		$MySQLstatement->close();
		$MySQLObj->mysql_close();

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
	
?>









