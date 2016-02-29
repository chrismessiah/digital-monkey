<?php
require '.env';

class MySQL_Handler {

	function __construct() {
		$this->conn = NULL;
	}

	function mysql_connect($print_status = false) {

		// PHP environment variables allow your scripts to glean certain types of data dynamically from the server.
		// This supports script flexibility in a potentially changing server environment.
		if (isset($_ENV["socket"]) && isset($_ENV["socket"])) {
			$conn = mysqli_connect($_ENV["hostname"], $_ENV["username"], $_ENV["password"], $_ENV["db_name"], $_ENV["port"], $_ENV["socket"]);
		} else {
			$conn = mysqli_connect($_ENV["hostname"], $_ENV["username"], $_ENV["password"], $_ENV["db_name"]);
		}

		// Check connection
		if ($print_status) {
			if ($conn->connect_error) {
			    die("<h2>Connection to DB FAILED: " . $conn->connect_error . "</h2>");
			} else {echo "Connection to DB success<br><br>";}
		}

		mysqli_set_charset($conn, 'utf8');
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
