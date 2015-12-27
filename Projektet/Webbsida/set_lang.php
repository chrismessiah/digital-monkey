<?php
	require 'session.php';
	if ($_SESSION["lang"] == "en") {
		$_SESSION["lang"] = "swe";
	} elseif ($_SESSION["lang"] == "swe") {
		$_SESSION["lang"] = "en";
	} else {
		$_SESSION["lang"] = "en";
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>