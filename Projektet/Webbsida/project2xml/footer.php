<?php

$footer = $xml->addChild('footer');

$intro = $footer->addChild('intro', $lang["footer_text1"]);
$list = $footer->addChild('list');

$bullet = $list->addChild('bullet1', $lang["footer_text2"]);
$bullet = $list->addChild('bullet2', $lang["footer_text3"]);
$bullet = $list->addChild('bullet3', $lang["footer_text4"]);
$bullet = $list->addChild('bullet4', $lang["footer_text5"]);
$bullet = $list->addChild('bullet5', $lang["footer_text6"]);
$bullet = $list->addChild('bullet6', $lang["footer_text7"]);
$bullet = $list->addChild('bullet7', $lang["footer_text8"]);

$outro = $footer->addChild('outro', $lang["footer_text9"]);

$creators = $footer->addChild('creators');

$creator1 = $creators->addChild('creator1');
$name = $creator1->addChild('name', 'Christian Abdelmassih');
$mail = $creator1->addChild('mail', "chrabd@kth.se");
$picPath = $creator1->addChild('picPath', 'public/footer/chris.png');
$linkedin = $creator1->addChild('linkedin', "https://se.linkedin.com/in/christianabdelmassih");

$creator2 = $creators->addChild('creator2');
$name = $creator2->addChild('name', 'Adelina Tahiri');
$mail = $creator2->addChild('mail', "tahiri@kth.se");
$picPath = $creator2->addChild('picPath', 'public/footer/adde.png');
$linkedin = $creator2->addChild('linkedin', "https://se.linkedin.com/in/adelina-tahiri-728b55a1");

$contact = $footer->addChild('contact', $lang["map_descr"]);

if (isset($_GET["xml"])) {
		if ($_GET["xml"] == "raw") {
			echo $xml->asXML();
		}
} else {

	$xml_document = new DOMDocument;
	$xml_document->loadXML($xml->asXML());

	$xsl_document = new DOMDocument;
	$xsl_document->load($xml_doc_path);	   

	$proc = new XSLTProcessor;
	$proc->importStyleSheet($xsl_document); // attach the xsl rules
	echo $proc->transformToXML($xml_document);

}

?>