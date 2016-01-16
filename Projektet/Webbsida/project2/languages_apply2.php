<?php


$xml = simplexml_load_file("languages.xml");
$lang = array();
if (!isset($_SESSION["lang"])) {
    $_SESSION["lang"] = "en";
}


foreach($xml->children() as $translation) { 
    
    $used_value = $translation->en; 
    if ($_SESSION["lang"] == "swe") {
    	$used_value = $translation->swe;
    }

    $attribute_name = (string)$translation['id'];
    $node_value = $used_value;
   
    $lang[$attribute_name] = $node_value;
    #echo $node_value."<br>";
} 



?>
