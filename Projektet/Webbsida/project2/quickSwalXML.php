<?php 
	$error = $xml->addChild('error');
	$title = $error->addChild('title', $title);
	$message = $error->addChild('message', $message);
	$type = $error->addChild('type', $type);
	$button_text = $error->addChild('button_text', $button_text);
?>