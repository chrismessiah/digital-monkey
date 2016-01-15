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

$link = $links->addChild('linkXML', $lang['xml_export']);
$link = $links->addChild('linkSetLang', $lang['change_lange']);


if ( $_SESSION["logged_in"] == false ) {
	$logged_out = $links->addChild('logged_out');
	$link = $logged_out->addChild('linkLogin', $lang['log_in']);
} else {
	$logged_in = $links->addChild('logged_in');
	$link = $logged_in->addChild('linkControl', $lang['control_panel']);
	$link = $logged_in->addChild('linkLogOut', $lang['log_out']);
	$link = $logged_in->addChild('profilePic', $_SESSION['pic_path']);
}

?>