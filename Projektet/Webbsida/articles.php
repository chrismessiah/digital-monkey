<?php
	require 'header.php';
	
	if ( isset($_GET["article"]) ) {
		# if the variable has a value

		if (  preg_match('/^[1-9][0-9]*$/', $_GET["article"])   ) { 
			$articleid = $_GET["article"];
			
			include 'connToMySQL.php';
			$MySQLObj = new MySQL_Handler();
			$MySQLObj->mysql_connect();
			$result = $MySQLObj->selectFromDB("COUNT(1)", "Blog", "blogpost_id="."'".$articleid."'");
			$boolean = $result->fetch_row();
			$boolean = $boolean[0];
			if ($boolean == 0) {
				# article id does not exist
				$MySQLObj->mysql_close();
				header('location:index.php?error=article_404');
				exit();
			} else {
				# article exists! Yaay!
				$result = $MySQLObj->selectFromDB("*", "Blog", "blogpost_id="."'".$articleid."'");
				$dict = $result->fetch_assoc();

				// $dict["image_path"];
				// $dict["title"];
				// $dict["intro"];
				// $dict["body"];
				// $dict["datetime"];

				?>


				<div id="article_banner"></div>

				<div id="article_body_wrapper">
					<p id="article_title"><?php echo $dict["title"]; ?></p>
					<p id="article_intro"><?php echo $dict["intro"]; ?></p>
					<p id="article_body"><?php echo $dict["body"]; ?></p>
				</div>

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
