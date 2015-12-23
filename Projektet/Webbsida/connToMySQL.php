<?php

class MySQL_Handler {
	
	function __construct() {
		$this->conn = NULL;
	}

	function mysql_connect($print_status = false) {
		
		// $hostname = "localhost"; // Oddly enough does not work
		
		$connect = "local";
		#$connect = "CSC";



		if ($connect == "local") {
			// For running locally		
			$hostname = "127.0.0.1";
			$username = "test";
			$password = "hello67";
			$db_name = "proj_xml";
			$port = 3306;
			$socket = "/var/run/mysqld/mysqld.sock";
			$conn = mysqli_connect($hostname, $username, $password, $db_name, $port, $socket);
		}
		elseif ($connect == "CSC") {
			//For runnting at KTH/CSC
			$hostname = "localhost";
			$username = "chrabd";
			$password = "chrabd-xmlpub13";
			$db_name = "chrabd";
			$conn = mysqli_connect($hostname, $username, $password, $db_name);
		}

		// Check connection
		if ($print_status) {
			if ($conn->connect_error) {
			    die("<h2>Connection to DB FAILED: " . $conn->connect_error . "</h2>");	
			} else {echo "Connection to DB success<br><br>";}
		}


		$this->conn = $conn;
	}

	function mysql_close() {
		if ($this->conn != NULL) {
			$this->conn->close();
		} else { 
		 	echo "Cannot close connection, DB not connected";	 

		}
	}

	// function selectFromDB($column_names, $table_name, $condition = "", $sorting_conditon = "") {
	// 	if ($condition != "") {
	// 		$condition = " WHERE ".$condition;
	// 	}
	// 	if ($sorting_conditon != "") {
	// 		$sorting_conditon = " ORDER BY ".$sorting_conditon;
	// 	}
	// 	$sql = "SELECT ".$column_names." FROM ".$table_name.$condition.$sorting_conditon.";"; // Select 
	// 	$result = $this->conn->query($sql);
	// 	return $result;
	// }

	// function insertIntoDB($column_names, $table_name, $value_names) {
	// 	$sql = "INSERT INTO ".$table_name." (".$column_names.") VALUES (".$value_names.");";
	// 	$result = $this->conn->query($sql);
	// 	return $result;
	// }

}



?>