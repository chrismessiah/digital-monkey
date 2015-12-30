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

				if (isset($_POST["superuser_priv"])) {
					$user_type = 0;
				} else {
					$user_type = 1;
				}
				
				$sql = "INSERT INTO Users (user_id, username, firstname, lastname, password, user_type) VALUES (?, ?, ?, ?, ?, ?)";
				$MySQLstatement = $MySQLObj->conn->prepare($sql);
				$MySQLstatement->bind_param("ssssss", $user_id, $_POST["new_user_username"], $_POST["new_user_firstname"], $_POST["new_user_lastname"], $_POST["new_user_password"], $user_type);
				$state = $MySQLstatement->execute();
				$MySQLstatement->close();
				header('location:control_panel.php?error=user_created');

			}

			elseif ($_GET["mode"] == "edit") {

				if (isset($_POST["delete"])) {
					$users_deleted = 0;
					if (isset($_POST["selected_user_id"])) {
						$MySQLObj = new MySQL_Handler();
						$MySQLObj->mysql_connect();
						$MySQLObj->conn->query("DELETE FROM Users WHERE user_id='".$_POST["selected_user_id"]."' AND username<>'admin';");
						$users_deleted = 1;
					}


					if ($users_deleted == 0) {
						header('location:control_panel.php?choice=edit_user&error=no_user_deleted');
					} elseif ($users_deleted == 1) {
						header('location:control_panel.php?choice=edit_user&error=one_user_deleted');
					}

				}

				else {
					if (isset($_GET["id"])) {
						if (is_numeric($_GET["id"])) {
							$MySQLObj = new MySQL_Handler();
							$MySQLObj->mysql_connect();

							$MySQLstatement = $MySQLObj->conn->prepare("SELECT password FROM Users WHERE user_id=?");
							$MySQLstatement->bind_param("s", $_GET["id"]);
							$state = $MySQLstatement->execute();
							$result = $MySQLstatement->get_result();
							$MySQLstatement->close();

							$foo = $result->fetch_row();
							$pwd = $foo[0];

							$priv = 1;

							$MySQLstatement = $MySQLObj->conn->prepare("UPDATE Users SET username=?, firstname=?, lastname=?, password=?, user_type=? WHERE user_id=? AND username<>'admin';");							

							if ($_POST["new_user_password"] != "") {
								$pwd = $_POST["new_user_password"];
							}
							
							if (isset($_POST["superuser_priv"])) {
								$priv = 0;
							}

							$MySQLstatement->bind_param("ssssss", $_POST["new_user_username"], $_POST["new_user_firstname"], $_POST["new_user_lastname"], $pwd, $priv, $_GET["id"]);
							$state = $MySQLstatement->execute();
							if ($state) {
								header('location:control_panel.php?error=user_updated');
							}

						} else {
							header('location:control_panel.php?error=no_user_edited');
						}
					} else {
						$MySQLObj = new MySQL_Handler();
						$MySQLObj->mysql_connect();
						$result = $MySQLObj->conn->query("SELECT count(*) FROM Users;");
						$count = $result->fetch_row();
						$count = $count[0];
						
						if (isset($_POST["selected_user_id"])) {
							$selected_user = $_POST["selected_user_id"];
							header('location:control_panel.php?choice=change_user&id='.$selected_user);
						} else {
							header('location:control_panel.php?error=no_user_selected');
						}
					}

				}

			} else {
				header('location:control_panel.php?error=some_error');
			}
		} else {
			header('location:index.php?error=some_error');
		}
	} else {
		header('location:control_panel.php?error=some_error');
	}

?>