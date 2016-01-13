<?php
	require 'header.php';
	
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
				?>


				<div id="article_banner"></div>

				<div id="article_body_wrapper">
					<p id="article_title"><?php echo $dict["title"]; ?></p>
					<p id="article_intro"><?php echo $dict["intro"]; ?></p>
					<p id="article_body"><?php echo text_format_this($dict["body"]); ?></p>
				</div>



				<!-- Social  share -->
				<?php
					$article_url = urlencode("http://xml.csc.kth.se/~chrabd/DM2517/project/articles.php?article=".$_GET["article"]);

					$tweet_href = "https://twitter.com/intent/tweet";
					$tweet_content = "?text=".urlencode($lang["tweet_content"]);
					$tweet_url = $tweet_href.$tweet_content."&url=".$article_url;

					$facebook_href = "http://www.facebook.com/sharer/sharer.php";
					$facebook_url = $facebook_href."?u=".$article_url;

					$google_href = "https://plus.google.com/share";
					$google_url = $google_href."?url=".$article_url;
				?>

				<div id="center_this">
					<a href="<?php echo $tweet_url; ?>" id="share_social_twitter"></a>
					<a href="<?php echo $facebook_url; ?>" id="share_social_facebook"></a>
					<a href="<?php echo $google_url; ?>" id="share_social_google"></a>
				</div>


				<style>
					#center_this {
						margin: auto;
						width: 12%;
						margin-top: 50px;
						margin-bottom: 50px;

					}
					#share_social_twitter {
						background-image: url("public/icons/social/twitter.png");
					}
					#share_social_facebook {
						background-image: url("public/icons/social/facebook.png");
					}
					#share_social_google {
						background-image: url("public/icons/social/google.png");
					}
					#share_social_twitter, #share_social_facebook, #share_social_google {
						width: 35px;
						height: 35px;
						background-size: 35px;
						display: inline-block;
						margin: 5px;
					}
				</style>
				<!-- Social  share end -->

				<?php
					if ($_SESSION["user_type"]== 0||$dict["created_by"] == $_SESSION["user_id"]) {
				?>

				<div id="buttons">
					<a href="control_panel.php?id=<?php echo $articleid ?>&mode=edit&choice=blogpost"><div id="button1"><p><?php echo $lang["button_edit"]; ?></p></div></a>
					<a href="delete_blogpost.php?id=<?php echo $articleid; ?>"><div id="button2"><p><?php echo $lang["button_delete"]; ?></p></div></a>
				</div>
				<style>
					#buttons {
						width: 30%;
						margin: auto;
						position: relative;
						left: 50px;
					}
					#buttons > a > div > p {
						text-align: center;
						color: #FFFFFF;
						font-size: 17px;
						font-family: Helvetica;
					}
					#button1 {
						background-color: rgba(65, 165, 155, 0.7);
					}
					#button2 {
						background-color: rgba(177, 0, 0, 0.7);
					}
					#button1, #button2 {
						border-radius: 60px;
						padding: 5px;
						padding-left: 20px;
						padding-right: 20px;
						width: 80px;
						display: inline-block;
						margin: 10px;
						margin-bottom: 50px;
					}
				</style>
				<?php
					}
				?>

				<style>
					#article_banner {
						width: 100%;
						height: 400px;
						background-image: url("<?php echo $dict["image_path"]; ?>");
						background-size: 100% 400px;
					}
					#article_title, #article_body, #article_intro {
						font-family: Times;
					}
					#article_title {
						font-size: 30px;
						text-align: center;
					}
					#article_body {
						font-size: 14px;
						margin-bottom: 50px;
					}
					#article_intro {
						font-size: 20px;
						text-align: center;
					}
					#article_body_wrapper {
						margin: auto;
    					width: 60%;
					}
				</style>

				<?php
				require 'footer.php';
				$MySQLstatement->close();
				$MySQLObj->mysql_close();
				require 'error.php';

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
?>
