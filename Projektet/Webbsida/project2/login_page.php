<?php
	$xml_doc_path = "login_page.xsl";
	require 'headerXML.php';

	$login = $xml->addChild('login_area');
	$placeholders = $login->addChild('placeholders');
	$username = $placeholders->addChild('username', $lang["user_create_username"]);
	$password = $placeholders->addChild('password', $lang["user_create_pwd"]);
	$forgot1 = $placeholders->addChild('forgot', $lang["user_create_pwd_fgt"]);
	$login2 = $placeholders->addChild('login', $lang["log_in"]);


	$links = $login->addChild('links');
	$forgot = $links->addChild('forgot_password', "login_page.php?error=forgot_pwd");

	$banner_path = $login->addChild('banner_path', "public/Albert-Einstein-genius-copy.jpg");

	$useXML = 1;
	require 'error.php';
	require 'footerXML.php';
?>