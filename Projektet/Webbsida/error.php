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
		else {
			$message = "Oh no! Some unknown error occurred!";
		}
		require 'quickSwal.php';
	}
?>