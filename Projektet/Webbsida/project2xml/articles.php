<?php
	require 'headerXML.php';
	$xml_doc_path = "articles.xsl";
	if ( isset($_GET["article"]) ) {
		# if the variable has a value

		if (  preg_match('/^[1-9][0-9]*$/', $_GET["article"])   ) { 
			$articleid = $_GET["article"];
			
			include 'connToMySQL.php';
			$MySQLObj = new MySQL_Handler();
			$MySQLObj->mysql_connect();
			$MySQLstatement = $MySQLObj->conn->prepare("SELECT COUNT(1) FROM Blog WHERE blogpost_id=?");
			$MySQLstatement->bind_param("s", $articleid);
			$MySQLstatement->execute();
			$result = $MySQLstatement->get_result();
			
			$boolean = $result->fetch_row();
			$boolean = $boolean[0];
			if ($boolean == 0) {
				# article id does not exist
				$MySQLstatement->close();
				$MySQLObj->mysql_close();
				header('location:index.php?error=article_404');
				exit();
			} else {
				$MySQLstatement->close();
				# article exists! Yaay!

				$MySQLstatement = $MySQLObj->conn->prepare("SELECT * FROM Blog WHERE blogpost_id=?");
				$MySQLstatement->bind_param("s", $articleid);
				$MySQLstatement->execute();
				$result = $MySQLstatement->get_result();

				$dict = $result->fetch_assoc();

				$article = $xml->addChild('article');

				$title = $article->addChild('title', $dict["title"]);
				$intro = $article->addChild('intro', $dict["intro"]);
				$body = $article->addChild('body', htmlspecialchars($dict["body"]));
				$image_path = $article->addChild('image_path', $dict["image_path"]);
				


				//Social  share 
				$article_url = urlencode("http://xml.csc.kth.se/~chrabd/DM2517/project/articles.php?article=".$_GET["article"]);

				$tweet_href = "https://twitter.com/intent/tweet";
				$tweet_content = "?text=".urlencode($lang["tweet_content"]);
				$tweet_url = $tweet_href.$tweet_content."&url=".$article_url;
				$facebook_href = "http://www.facebook.com/sharer/sharer.php";
				$facebook_url = $facebook_href."?u=".$article_url;
				$google_href = "https://plus.google.com/share";
				$google_url = $google_href."?url=".$article_url;

				
				$social_share = $xml->addChild('social_share');

				$twitter = $social_share->addChild('twitter');
				$facebook = $social_share->addChild('facebook');
				$google = $social_share->addChild('google');

				$twitter->share_url = $tweet_url;
				$facebook->share_url = $facebook_url;
				$google->share_url = $google_url;

					if ($_SESSION["user_type"]== 0||$dict["created_by"] == $_SESSION["user_id"]) {
						$admin_controls = $xml->addChild('admin_controls');
						$delete = $admin_controls->addChild('delete');
						$link = $delete->addChild('link', "delete_blogpost.php?id=".$articleid);
						$label = $delete->addChild('label', $lang["button_delete"]);
						$edit = $admin_controls->addChild('edit');
						$link = $edit->addChild('link', "control_panel.php?id=".$articleid."&mode=edit&choice=blogpost");
						$label = $edit->addChild('label', $lang["button_edit"]);
					}

				$MySQLstatement->close();
				$MySQLObj->mysql_close();

			}

		} else {
			# if it is not a number
			header('location:index.php?error=article_input_error');
			exit();
		}
	} else {
		header('location:index?error=article_non_selection.php');
		exit();
	}

require 'footerXML.php';
?>