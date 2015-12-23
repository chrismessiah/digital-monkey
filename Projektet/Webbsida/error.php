<?php
	$message = "";
	$title = "Error!";
	$type = "error";
	$button_text = "Okay";

	if ( isset($_GET["error"])) {
		if ($_GET["error"] == "hacker") {
			$message = "You're trying to beat the system? This IS the system. Beating you back!";
		}
		elseif ($_GET["error"] == "pwd_fail") {
			$message = "Wrong username/password combination!";
		}
		elseif ($_GET["error"] == "article_input_error") {
			$message = "No article found! (Did you make a nauhty command?)";
		}
		elseif ($_GET["error"] == "article_404") {
			$message = "No article not found!";
		}
		elseif ($_GET["error"] == "article_non_selection") {
			$message = "No article selected!";
		}
		elseif ($_GET["error"] == "forgot_pwd") {
			$message = "Please contact KTH/CSC";
			$type = "warning";
		}
		elseif ($_GET["error"] == "file_not_image") {
			$message = "The file you uploaded is not an image!";
		}
		elseif ($_GET["error"] == "file_exists") {
			$message = "The there is already an image with the same name, please change it!";
			$type = "warning";
		}
		elseif ($_GET["error"] == "file_too_large") {
			$message = "Sorry, the image has way too large size to be transfered";
		}
		elseif ($_GET["error"] == "unknown_filetype") {
			$message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
		}
		elseif ($_GET["error"] == "file_not_uploaded") {
			$message = "Sorry, the file was not uploaded!";
		}
		elseif ($_GET["error"] == "file_upload_fail") {
			$message = "Some random upload fail";
		}
		elseif ($_GET["error"] == "filename_contains_space") {
			$message = "The filename contains a space! Remove it!";
			$type = "warning";
		}
		elseif ($_GET["error"] == "blogpost_deleted") {
			$message = "The blogpost was deleted!";
			$type = "success";
		}
		else {
			$message = "Oh no! Some unknown error occurred!";
		}
		require 'quickSwal.php';
	}
?>