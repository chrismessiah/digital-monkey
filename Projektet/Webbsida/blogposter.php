<?php
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

	ob_start();
	error_reporting(E_ALL); // To see all errors
	date_default_timezone_set('Europe/Stockholm');
	$datetime = date('Y-m-d h:i:s', time());

	require 'connToMySQL.php';
	$MySQLObj = new MySQL_Handler();
	$MySQLObj->mysql_connect();
	while (true) {
		$blogpostid = rand(1, 99999999);
		$result = $MySQLObj->selectFromDB("COUNT(1)", "Blog", "blogpost_id="."'".$blogpostid."'");
		$boolean = $result->fetch_row();
		$boolean = $boolean[0];
		if ($boolean == 0) {
			break;
		}
	}

	// if (  !isset($_POST["fileToUpload"])   ) {
	// 	$_POST["fileToUpload"] = "public/blog/o-WORK-FRIENDS-facebook.jpg";
	// }
	if ( !isset($_POST["newpost_title"]) ) {
		$_POST["newpost_title"] = "";
	}

	if ( !isset($_POST["newpost_intro"]) ) {
		$_POST["newpost_intro"] = "";
	}

	if ( !isset($_POST["newpost_body"]) ) {
		$_POST["newpost_body"] = "";
	}
	

	if (!isset($_POST["in_red"])) {
		echo "111111";
		$r = 0;
	} else {
		if (good_integers($_POST["in_red"])) {
			echo "22222";
			$r = $_POST["in_red"];
		} else {
			echo "33333";
			$r = 0;
		}
	}


	if (!isset($_POST["in_green"])) {
		$g = 0;
	} else {
		if (good_integers($_POST["in_green"])) {
			$g = $_POST["in_green"];
		} else {
			$g = 0;
		}
	}



		if (!isset($_POST["in_blue"])) {
		$b = 0;
	} else {
		if (good_integers($_POST["in_blue"])) {
			$b = $_POST["in_blue"];
		} else {
			$b = 0;
		}
	}

	if ($r == 0 && $b == 0 && $g == 0) {
		$aplha = 0;
	} else {
		$aplha = 0.3;
	}

	$colors = $r.", ".$g.", ".$b.", ".$aplha;

	# Check for good input
	$_POST["newpost_title"];
	$_POST["newpost_intro"];
	$_POST["newpost_body"];


	if ($_FILES["fileToUpload"]["name"] != "") {
		require 'upload.php';
	}
	else {
		$target_file = "public/blog/o-WOMEN-AT-WORK-facebook.jpg";
	}



	$columns = "blogpost_id, image_path, title, intro, body, datetime, overlay_color";
	$values = "'".$blogpostid."','".$target_file."','".$_POST["newpost_title"]."','".$_POST["newpost_intro"]."','".$_POST["newpost_body"]."','".$datetime."','".$colors."'";

	$result = $MySQLObj->insertIntoDB($columns, "Blog", $values);

	#header('location:articles.php?article='.$blogpostid);
	exit();
?>











