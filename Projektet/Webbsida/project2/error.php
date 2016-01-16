<?php
	$message = "";
	$title = $lang["error_title_error"];
	$type = "error";
	$button_text = $lang["error_button_okay"];

	if ( isset($_GET["error"])) {
		if ($_GET["error"] == "hacker") {
			$message = $lang["error_hacker"];
		} elseif ($_GET["error"] == "pwd_fail") {
			$message = $lang["error_pwd_fail"];

		} elseif ($_GET["error"] == "article_input_error") {
			$message = $lang["error_article_input_error"];

		} elseif ($_GET["error"] == "article_404") {
			$message = $lang["error_article_404"];

		} elseif ($_GET["error"] == "article_non_selection") {
			$message = $lang["error_article_non_selection"];

		} elseif ($_GET["error"] == "forgot_pwd") {
			$title = $lang["error_title_warning"];
			$message = $lang["error_forgot_pwd"];
			$type = "warning";

		} elseif ($_GET["error"] == "file_not_image") {
			$message = $lang["error_file_not_image"];

		} elseif ($_GET["error"] == "file_exists") {
			$message = $lang["error_file_exists"];
			$type = "warning";

		} elseif ($_GET["error"] == "file_too_large") {
			$message = $lang["error_file_too_large"];
		
		} elseif ($_GET["error"] == "unknown_filetype") {
			$message = $lang["error_unknown_filetype"];
		
		} elseif ($_GET["error"] == "file_not_uploaded") {
			$message = $lang["error_file_not_uploaded"];
		
		} elseif ($_GET["error"] == "file_upload_fail") {
			$message = $lang["error_file_upload_fail"];
		
		} elseif ($_GET["error"] == "filename_contains_space") {
			$title = $lang["error_title_warning"];
			$message = $lang["error_filename_contains_space"];
			$type = "warning";
		
		} elseif ($_GET["error"] == "blogpost_deleted") {
			$title = $lang["error_title_success"];
			$message = $lang["error_blogpost_deleted"];
			$type = "success";
		
		} elseif ($_GET["error"] == "user_created") {
			$title = $lang["error_title_success"];
			$message = $lang["error_user_created"];
			$type = "success";
		
		} elseif ($_GET["error"] == "no_user_deleted") {
			$title = $lang["error_title_warning"];
			$message = $lang["error_no_user_deleted"];
			$type = "warning";
		
		} elseif ($_GET["error"] == "one_user_deleted") {
			$title = $lang["error_title_success"];
			$message = $lang["error_one_user_deleted"];
			$type = "success";
		
		} elseif ($_GET["error"] == "X_user_deleted") {
			$title = $lang["error_title_success"];
			$message = $lang["error_X_user_deleted"];
			$type = "success";
		
		} elseif ($_GET["error"] == "user_updated") {
			$title = $lang["error_title_success"];
			$message = $lang["error_user_updated"];
			$type = "success";
		
		} elseif ($_GET["error"] == "no_user_edited") {
			$title = $lang["error_title_warning"];
			$message = $lang["error_no_user_edited"];
			$type = "warning";
		
		} elseif ($_GET["error"] == "blogpost_posted") {
			$title = $lang["error_title_success"];
			$message = $lang["error_blogpost_posted"];
			$type = "success";
		
		} elseif ($_GET["error"] == "blogpost_updated") {
			$title = $lang["error_title_success"];
			$message = $lang["error_blogpost_updated"];
			$type = "success";
		
		} else {
			$message = $lang["error_standard"];
		}

		if (isset($useXML)) {
			require 'quickSwalXML.php';
		} else {
			require 'quickSwal.php';
		}
	}
?>