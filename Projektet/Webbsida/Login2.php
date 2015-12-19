<?php
error_reporting(E_ALL); // To see all errors
require ('Head.php');
require('getDataFromDB.php');

$result = getDataFromDB('username, password');
$inputted_username = $_POST["l_username"];
$inputted_password = $_POST["l_password"];

// Using associative array/dict (suited for multple columns)
for ($i=0; $i < $result->num_rows;; $i++) { 
	$dict = $result->fetch_assoc();
	if (strtolower($inputted_username) == strtolower($dict['username'])) {
		if ($inputted_password == $dict['password']) {
			echo "Log in success!";
			break;
		} else {
			echo "Log in fail, wrong password";
			break;
		}
	}
}


?>