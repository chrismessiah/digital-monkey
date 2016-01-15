<?php

require 'connToMySQL.php';
require 'text_formatter.php';
$MySQLObj = new MySQL_Handler();
$MySQLObj->mysql_connect();

$result = $MySQLObj->conn->query("SELECT count(*) FROM Blog;");
$count = $result->fetch_row();
$blogposts_count = $count[0];

$result = $MySQLObj->conn->query("SELECT count(*) FROM Users;");
$count = $result->fetch_row();
$user_count = $count[0];


$user_result = $MySQLObj->conn->query("SELECT * FROM Users;");
$blog_result = $MySQLObj->conn->query("SELECT * FROM Blog;");

$root = 'website';
$xml = new SimpleXMLElement('<'.$root.'/>');
$users = $xml->addChild('users');

for ($i=0; $i < $user_count; $i++) { 
	$dict = $user_result->fetch_assoc();
		
		$user = $users->addChild('user');

		$id = $user->addChild('id', $dict["user_id"]);
		$username = $user->addChild('username',$dict["username"]);
		$firstname = $user->addChild('firstname',$dict["firstname"]);
		$lastname = $user->addChild('lastname',$dict["lastname"]);
		$password = $user->addChild('password',"*PROTECTED-BY-DEV*");
		$picture_path = $user->addChild('picture_path',$dict["pic_name"]);
		$user_type = $user->addChild('user_type',$dict["user_type"]);

}

$blogposts = $xml->addChild('blogposts');

for ($i=0; $i < $blogposts_count; $i++) { 
	$dict = $blog_result->fetch_assoc();
	$color_array = explode(", ", $dict["overlay_color"]);
	
	$blogpost = $blogposts->addChild('blogpost');
	$id = $blogpost->addChild('id',$dict["blogpost_id"]);
	$banner_path = $blogpost->addChild('banner_path',$dict["image_path"]);
	$title = $blogpost->addChild('title',$dict["title"]);
	$intro = $blogpost->addChild('intro',$dict["intro"]);
	$body = $blogpost->addChild('body', preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', un_text_format_this($dict["body"])));
	$datetime = $blogpost->addChild('datetime',$dict["datetime"]);
	
	$banner_color = $blogpost->addChild('banner_color');
	$r = $banner_color->addChild("r", $color_array[0]);
	$g = $banner_color->addChild("g", $color_array[1]);
	$b = $banner_color->addChild("b", $color_array[2]);
	$alpha = $banner_color->addChild("alpha", $color_array[3]);	
	$author_id = $blogpost->addChild('author_id',$dict["created_by"]);
}

$old = new DOMDocument;
$old->loadXML($xml->asXML());

$creator = new DOMImplementation;
$doctype = $creator->createDocumentType($root, null, 'xml_validate.dtd');

$new = $creator->createDocument(null, null, $doctype);
$new->encoding = "utf-8";

$oldNode = $old->getElementsByTagName($root)->item(0);
$newNode = $new->importNode($oldNode, true);
$new->appendChild($newNode);

// returns true if success
$state = $new->validate();
if ($state) {
	header ("Content-Type:text/xml");

	if (isset($_GET["xml"])) {
		if ($_GET["xml"] == "raw") {
			echo $xml->asXML();
		}
	} else {
	
		$xml_document = new DOMDocument;
		$xml_document->loadXML($xml->asXML());

		$xsl_document = new DOMDocument;

		include 'modules/Mobile_Detect/Mobile_Detect.php';
		$detect = new Mobile_Detect();
		if ($detect->isMobile()) {
			// Mobile
			$xsl_document->load('xml_validate_mobile.xsl');
		} else {
			// Desktop
			$xsl_document->load('xml_validate.xsl');	   
		}

		// Configure the transformer
		$proc = new XSLTProcessor;
		$proc->importStyleSheet($xsl_document); // attach the xsl rules
		echo $proc->transformToXML($xml_document);
	}
} else {
	echo "XML DOES NOT VALIDATE";
}

?>