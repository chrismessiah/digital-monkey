<?php
	$xml_doc_path = "index.xsl";
	require 'headerXML.php';
	require 'connToMySQL.php';
	$MySQLObj = new MySQL_Handler();
	$MySQLObj->mysql_connect();

	# Count no. of blogposts
	$result = $MySQLObj->conn->query("SELECT count(*) FROM Blog;");
	$count = $result->fetch_row();
	$count = $count[0];

	# Get each blogpost
	$result = $MySQLObj->conn->query("SELECT * FROM Blog ORDER BY datetime DESC;");



	$articles = $xml->addChild('articles');
	for ($i=0; $i < $count; $i++) { 

		$dict = $result->fetch_assoc();
		$article = $articles->addChild('article');

		$id = $article->addChild('id', $dict["blogpost_id"]);
		$title = $article->addChild('title', $dict["title"]);
		$intro = $article->addChild('intro', $dict["intro"]);
		$image_path = $article->addChild('image_path', $dict["image_path"]);
		$overlay_color = $article->addChild('overlay_color', $dict["overlay_color"]);

		$css_blog_id = $article->addChild('css_blog_id', 'blog_article_'.$dict["blogpost_id"]);
		$css_blog_title = $article->addChild('css_blog_title', 'blog_article_'.$dict["blogpost_id"]."_title");
		$css_blog_intro = $article->addChild('css_blog_intro', 'blog_article_'.$dict["blogpost_id"]."_intro");
	}
	require 'footerXML.php';
?>