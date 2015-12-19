<?php

class MySQL_Handler {
	
	function __construct() {
		$this->conn = NULL;
	}

	function mysql_connect($print_status = false) {
		$hostname = "127.0.0.1";
		// $hostname = "localhost"; // Oddly enough does not work

		$username = "test";
		$password = "hello67";
		$db_name = "testDB";
		$port = 3306;
		$socket = "/var/run/mysqld/mysqld.sock";

		// Create connection
		$conn = mysqli_connect($hostname, $username, $password, $db_name, $port, $socket);

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

}

?>










