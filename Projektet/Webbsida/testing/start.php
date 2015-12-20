<?php
// start them engines!
session_start();
// store session data
$_SESSION["username"] = "Oddity";
$_SESSION["superbool"] = true;

header("location:started.php")
?>