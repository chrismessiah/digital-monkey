<?php
session_start();
setcookie('foo', 'bar', time()+3600);
header("location: check.php");
?>