<?php
	require 'session.php';
	require 'connToMySQL.php';
	error_reporting(E_ALL);
	if (isset($_GET["mode"])) {
		if ($_SESSION["user_type"] == 0) {
			if ($_GET["mode"] == "create" && $_POST["new_user_username"] != "" && $_POST["new_user_firstname"] != "" && $_POST["new_user_lastname"] != "" && $_POST["new_user_password"] != "") {
				
				$MySQLObj = new MySQL_Handler();
				$MySQLObj->mysql_connect();
	
				while (true) {
					$user_id = rand(1, 99999999);
					$MySQLstatement = $MySQLObj->conn->prepare("SELECT COUNT(1) FROM Users WHERE user_id=?");
					$MySQLstatement->bind_param("s", $user_id);
					$state = $MySQLstatement->execute();
					$result = $MySQLstatement->get_result();
					$MySQLstatement->close();

					$boolean = $result->fetch_row();
					$boolean = $boolean[0];
					if ($boolean == 0) {
						break;
					}
				}

				$user_type = 1;

				$sql = "INSERT INTO Users (user_id, username, firstname, lastname, password, user_type) VALUES (?, ?, ?, ?, ?, ?)";
				$MySQLstatement = $MySQLObj->conn->prepare($sql);
				$MySQLstatement->bind_param("ssssss", $user_id, $_POST["new_user_username"], $_POST["new_user_firstname"], $_POST["new_user_lastname"], $_POST["new_user_password"], $user_type);
				$state = $MySQLstatement->execute();
				$MySQLstatement->close();
				header('location:control_panel.php?error=user_created');
			}
			elseif ($_GET["mode"] == "delete") {
				$MySQLObj = new MySQL_Handler();
				$MySQLObj->mysql_connect();
				$result = $MySQLObj->conn->query("SELECT count(*) FROM Users WHERE user_type=1;");
				$count = $result->fetch_row();
				$count = $count[0];
				$users_deleted = 0;
				
				$result = $MySQLObj->conn->query("SELECT user_id FROM Users WHERE user_type=1;");

				for ($i=0; $i < $count; $i++) { 
					$foo = $result->fetch_row();
					$current_user_id = $foo[0];
					if (isset($_POST["delete_user_id_".$current_user_id])) {
						$MySQLObj->conn->query("DELETE FROM Users WHERE user_type=1 AND user_id='".$current_user_id."';");
						$users_deleted = $users_deleted + 1;
					}

				}

				if ($users_deleted == 0) {
					header('location:control_panel.php?choice=add_user&error=no_user_deleted');
				} elseif ($users_deleted == 1) {
					header('location:control_panel.php?choice=add_user&error=one_user_deleted');
				} else {
					header('location:control_panel.php?choice=add_user&error=X_user_deleted');
				}
			} else {
				header('location:control_panel.php?choice=add_user&error=some_error');
			}
		} else {
			header('location:index.php?error=some_error');
		}
	} else {
		header('location:control_panel.php?choice=add_user&error=some_error');
	}

?>