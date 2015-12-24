<?php
	require 'session.php';
	require 'connToMySQL.php';
	if (isset($_GET["id"])) {
		$MySQLObj = new MySQL_Handler();
		$MySQLObj->mysql_connect();
		$MySQLstatement = $MySQLObj->conn->prepare("SELECT created_by FROM Blog WHERE blogpost_id=?");
		$MySQLstatement->bind_param("s", $_GET["id"]);
		$MySQLstatement->execute();
		$result = $MySQLstatement->get_result();

		$foo = $result->fetch_row();
		$created_by_user = $foo[0];

		if (($_SESSION["user_type"] == 0 || $_SESSION["user_id"] == $created_by_user) && is_numeric($_GET["id"])) {
			$MySQLstatement = $MySQLObj->conn->prepare("SELECT COUNT(1) FROM Blog WHERE blogpost_id=?");
			$MySQLstatement->bind_param("s", $_GET["id"]);
			$MySQLstatement->execute();
			$result = $MySQLstatement->get_result();

			$boolean = $result->fetch_row();
			$boolean = $boolean[0];
			if ($boolean == 0) {
				# article id does not exist
				$MySQLstatement->close();
				$MySQLObj->mysql_close();
				header('location:index.php?error=article_404');
				exit();
			} else {
				$MySQLstatement->close();
				$MySQLstatement = $MySQLObj->conn->prepare("DELETE FROM Blog WHERE blogpost_id=?");
				$MySQLstatement->bind_param("s", $_GET["id"]);
				$MySQLstatement->execute();
				header('location:index.php?error=blogpost_deleted');
				exit();
			}
		} else {
			header('location:index.php?error=someerror');
			exit();
		}
	} else {
		header('location:index.php?error=someerror');
		exit();
	}



?>