<?php
	if ( isset($_GET["error"])) {
		if ($_GET["error"] == "hacker") {
			$error_message = "You're trying to beat the system? This IS the system. Beating you back!";
		}
		elseif ($_GET["error"] == "pwd_fail") {
			$error_message = "Wrong username/password combination!";
		}
		elseif ($_GET["error"] == "article_input_error") {
			$error_message = "No article found! (Did you make a nauhty command?)";
		}
		elseif ($_GET["error"] == "article_404") {
			$error_message = "No article not found!";
		}
		elseif ($_GET["error"] == "article_non_selection") {
			$error_message = "No article selected!";
		}
		require 'quickSwal.php';
	}
?>