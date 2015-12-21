<?php
	require 'header.php';
	
	if ( isset($_GET["article"]) ) {
		# if the variable has a value

		if (  preg_match('/^[1-9][0-9]*$/', $_GET["article"])   ) { 
			$articleid = $_GET["article"];
			
			$MySQLObj = new MySQL_Handler();
			$MySQLObj->mysql_connect();
			$result = $MySQLObj->selectFromDB("COUNT(1)", "Blog", "blogpost_id="."'".$articleid."'");
			$boolean = $result->fetch_row()[0];
			if ($boolean == 0) {
				# article id does not exist
				$MySQLObj->mysql_close();
				header('location:index.php?error=article_404');
				exit();
			} else {
				# article exists! Yaay!
				$result = $MySQLObj->selectFromDB("*", "Blog", "blogpost_id="."'".$articleid."'");
				$dict = $result->fetch_assoc();

				$dict["image_path"];
				$dict["title"];
				$dict["intro"];
				$dict["body"];
				$dict["datetime"];








			}

		} else {
			# if it is not a number
			header('location:index.php?error=article_input_error');
			exit();
		}
	} else {
		header('location:index?error=article_non_selection.php');
		exit();
	}
?>
