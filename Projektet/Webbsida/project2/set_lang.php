<?php
	require 'session.php';
	if ($_SESSION["lang"] == "en") {
		$_SESSION["lang"] = "swe";
	} elseif ($_SESSION["lang"] == "swe") {
		$_SESSION["lang"] = "en";
	} else {
		$_SESSION["lang"] = "en";
	}

	// Removes error messages from url
	list($file, $parameters) = explode('?', $_SERVER['HTTP_REFERER']);
	parse_str($parameters, $output);
	unset($output['error']);
	$result = $file . '?' . http_build_query($output); // Rebuild the url
	header('Location: '.$result);
?>