<?php
// start them engines!
session_start();
// store session data
$_SESSION["username"] = "Oddity";

header("location:some.php")
?>