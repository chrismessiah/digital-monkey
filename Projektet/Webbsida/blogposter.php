<?php
	ob_start();
	error_reporting(E_ALL); // To see all errors
	date_default_timezone_set('Europe/Stockholm');


	require 'connToMySQL.php';

	
	function good_integers($value)
	{
		if (is_numeric($value)) {
			if ($value >= 0 && $value <= 255) {
				return True;
			} else {
				return False;
			}
		} else {
			return False;
		}
	}

	function color_fix($string)
	{
		if (!isset($_POST[$string])) {
			$var = 0;
		} else {
			if (good_integers($_POST[$string])) {
				$var = $_POST[$string];
			} else {
				$var = 0;
			}
		}
		return $var;
	}
	
	function is_set_checker($string)
	{
		if ( !isset($_POST[$string]) ) {
			$_POST[$string] = "";
		}
	}

	$datetime = date('Y-m-d h:i:s', time());

	$MySQLObj = new MySQL_Handler();
	$MySQLObj->mysql_connect();


	while (true) {
		if (isset($_GET["mode"]) && isset($_GET["id"])) {
			if ($_GET["mode"] == "alter" && is_numeric($_GET["id"])) { 
				$blogpostid = $_GET["id"];
				break;
			}
		} else {
			$blogpostid = rand(1, 99999999);
		}

		$MySQLstatement = $MySQLObj->conn->prepare("SELECT COUNT(1) FROM Blog WHERE blogpost_id=?");
		$MySQLstatement->bind_param("s", $blogpostid);
		$state = $MySQLstatement->execute();
		$result = $MySQLstatement->get_result();
		$MySQLstatement->close();

		$boolean = $result->fetch_row();
		$boolean = $boolean[0];
		if ($boolean == 0 && !isset($_GET["id"])) {
			break;
		}
		if ($boolean == 1 && isset($_GET["id"])) {
			break;
		}
	}


	is_set_checker("newpost_title");
	is_set_checker("newpost_intro");
	is_set_checker("newpost_body");

	$r = color_fix("in_red");
	$b = color_fix("in_blue");
	$g = color_fix("in_green");
	$aplha = 0.3;

	if ($r == 0 && $b == 0 && $g == 0) {
		$aplha = 0;
	}

	$colors = $r.", ".$g.", ".$b.", ".$aplha;



	if ($_FILES["fileToUpload"]["name"] != "") {
		require 'upload.php';
	}
	else {
		if (isset($_GET["mode"])) {
			if ($_GET["mode"] == "alter") {
				$MySQLstatement = $MySQLObj->conn->prepare("SELECT image_path FROM Blog WHERE blogpost_id=?");
				$MySQLstatement->bind_param("s", $blogpostid);
				$state = $MySQLstatement->execute();
				$result = $MySQLstatement->get_result();
				$MySQLstatement->close();
				$arr = $result->fetch_row();
				$target_file = $arr[0];
			}
		} else {
			$target_file = "public/blog/o-WOMEN-AT-WORK-facebook.jpg";
		}
	}


	if (isset($_GET["mode"])) {
		if ($_GET["mode"] == "alter") {
			$sql = "UPDATE Blog SET image_path=?, title=?, intro=?, body=?, datetime=?, overlay_color=? WHERE blogpost_id=?;";
			$MySQLstatement = $MySQLObj->conn->prepare($sql);
			$MySQLstatement->bind_param("sssssss", $target_file, $_POST["newpost_title"], $_POST["newpost_intro"], $_POST["newpost_body"], $datetime, $colors, $blogpostid);
		}
	} else {
		$sql = "INSERT INTO Blog (blogpost_id, image_path, title, intro, body, datetime, overlay_color) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$MySQLstatement = $MySQLObj->conn->prepare($sql);
		$MySQLstatement->bind_param("sssssss", $blogpostid, $target_file, $_POST["newpost_title"], $_POST["newpost_intro"], $_POST["newpost_body"], $datetime, $colors);
	}

	$state = $MySQLstatement->execute();
	$MySQLstatement->close();
	$MySQLObj->mysql_close();
	if (!$state) {
		echo "ERROR???";
	} else {
		header('location:articles.php?article='.$blogpostid);
		exit();
	}
?>











