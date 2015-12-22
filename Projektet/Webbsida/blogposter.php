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











