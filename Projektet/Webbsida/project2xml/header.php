<?php

//ob_start();
header ("Content-Type:text/xml");
require 'session.php';
require 'text_formatter.php';
require 'languages_apply2.php';

$root = 'website';
$xml = new SimpleXMLElement('<'.$root.'/>');

$header = $xml->addChild('header');

$logo = $header->addChild('logo', 'public/header/kth.png');
$links = $header->addChild('links');

$link1 = $links->addChild('linkXML', $lang['xml_export']);
$link5 = $links->addChild('linkSetLang', $lang['change_lange']);


if ( $_SESSION["logged_in"] == false ) {
	$link2 = $links->addChild('linkLogin', $lang['log_in']);
} else {
	$link3 = $links->addChild('linkControl', $lang['control_panel']);
	$link4 = $links->addChild('linkLogOut', $lang['log_out']);
	$link9 = $links->addChild('profilePic', $_SESSION['pic_path']);
}

?>