<?php
	require 'session.php';
	require 'connToMySQL.php';
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