<?php
//header ("Content-Type:text/xml");
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

$xml="<website><users>";

for ($i=0; $i < $user_count; $i++) { 
	$dict = $user_result->fetch_assoc();
	$xml .="<user>";
	$xml .= "<id>".$dict["user_id"]."</id>";
	$xml .= "<username>".$dict["username"]."</username>";
	$xml .= "<firstname>".$dict["firstname"]."</firstname>";
	$xml .= "<lastname>".$dict["lastname"]."</lastname>";
	$xml .= "<password>"."*PROTECTED-BY-DEV*"."</password>";
	$xml .= "<picture_path>".$dict["pic_name"]."</picture_path>";
	$xml .= "<user_type>".$dict["user_type"]."</user_type>";
	$xml .= "</user>";
}

$xml.= "</users><blogposts>";

for ($i=0; $i < $blogposts_count; $i++) { 
	$dict = $blog_result->fetch_assoc();
	$color_array = explode(", ", $dict["overlay_color"]);
	$xml.= "<blogpost>";
	$xml.= "<id>".$dict["blogpost_id"]."</id>";
	$xml.= "<banner_path>".$dict["image_path"]."</banner_path>";
	$xml.= "<title>".$dict["title"]."</title>";
	$xml.= "<intro>".$dict["intro"]."</intro>";
	$xml.= "<body>".preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', un_text_format_this($dict["body"]))."</body>";
	$xml.= "<datetime>".$dict["datetime"]."</datetime>";
	$xml.= "<banner_color>";
	$xml.= "<r>".$color_array[0]."</r>";
	$xml.= "<g>".$color_array[1]."</g>";
	$xml.= "<b>".$color_array[2]."</b>";
	$xml.= "<alpha>".$color_array[3]."</alpha>";	
	$xml.= "</banner_color>";
	$xml.= "<author_id>".$dict["created_by"]."</author_id>";
	$xml.= "</blogpost>";
}

$xml.= "</blogposts></website>";


$root = 'website';

$old = new DOMDocument;
$old->loadXML($xml);

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
	
	$xml_document = new DOMDocument;
	$xml_document->loadXML($xml);

	$xsl_document = new DOMDocument;
	$xsl_document->load('xml_validate.xsl');

	// Configure the transformer
	$proc = new XSLTProcessor;
	$proc->importStyleSheet($xsl_document); // attach the xsl rules
	//echo $xml;
	echo $proc->transformToXML($xml_document);
} else {
	echo "XML DOES NOT VALIDATE";
}

?>