<?php
	error_reporting(E_ALL); // To see all errors
	date_default_timezone_set('Europe/Stockholm');
	$datetime = date('Y-m-d h:i:s', time());

	require 'connToMySQL.php';
	$MySQLObj = new MySQL_Handler();
	$MySQLObj->mysql_connect();
	while (true) {
		$blogpostid = rand(1, 99999999);
		$result = $MySQLObj->selectFromDB("COUNT(1)", "Blog", "blogpost_id="."'".$blogpostid."'");
		$boolean = $result->fetch_row()[0];
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

	# Check for good input
	$_POST["newpost_title"];
	$_POST["newpost_intro"];
	$_POST["newpost_body"];



	require 'upload.php';





	$columns = "blogpost_id, image_path, title, intro, body, datetime";
	$values = "'".$blogpostid."','".$target_file."','".$_POST["newpost_title"]."','".$_POST["newpost_intro"]."','".$_POST["newpost_body"]."','".$datetime."'";
	#$_POST["fileToUpload"] = "hello";

	$result = $MySQLObj->insertIntoDB($columns, "Blog", $values);

	#header('location:articles.php?article='.$blogpostid);
	#exit();
?>











