<?php
	require 'header.php';
	require 'text_formatter.php';

	$current_title = "";
	$current_intro = "";
	$current_body = "";
	$current_image_path = "";
	$r = "";
	$g = "";
	$b = "";
	$mode = "";

	if ($_SESSION["logged_in"] == false) {
		# Not logged in
		header('location:index.php?error=some_error');
		exit();
	}
	else {
		# Is logged in
		if ($_SESSION["user_type"] == 0) {
			# Is admin
			if (isset($_GET["choice"])) {
				# has selected from menu
				if ($_GET["choice"] == "blogpost") {
					# choice 1
					if (isset($_GET["id"]) && isset($_GET["mode"]) )  {
						if (is_numeric($_GET["id"]) && $_GET["mode"] == "edit") {
							require 'connToMySQL.php';
							$MySQLObj = new MySQL_Handler();
							$MySQLObj->mysql_connect();
							$MySQLstatement = $MySQLObj->conn->prepare("SELECT COUNT(1) FROM Blog WHERE blogpost_id=?");
							$MySQLstatement->bind_param("s", $_GET["id"]);
							$MySQLstatement->execute();
							$result = $MySQLstatement->get_result();
							$boolean = $result->fetch_row();
							$boolean = $boolean[0];
							if ($boolean == 1) {
								$MySQLstatement->close();
								$MySQLstatement = $MySQLObj->conn->prepare("SELECT * FROM Blog WHERE blogpost_id=?");
								$MySQLstatement->bind_param("s", $_GET["id"]);
								$MySQLstatement->execute();
								$result = $MySQLstatement->get_result();
								$dict = $result->fetch_assoc();
								
								$current_title = $dict["title"];
								$current_intro = $dict["intro"];
								$current_body = un_text_format_this($dict["body"]);
								$current_image_path = $dict["image_path"];

								$current_overlay_color = $dict["overlay_color"];
								$color_array = explode(", ", $current_overlay_color);
								$r = $color_array[0];
								$g = $color_array[1];
								$b = $color_array[2];
								$mode = "?mode=alter&id=".$_GET["id"];

							}
						}
					}

					?>


					<div id="menu_wrapper">
						<p id="page_title">Make new blogpost</p>

						<form method="post" action="blogposter.php<?php echo $mode; ?>" enctype="multipart/form-data">
							<p class="input_descr">Title</p>
							<input type="text" name="newpost_title" placeholder="What will you call it?" value="<?php echo $current_title; ?>" />
							<p class="input_descr">Introduction</p>
							<input type="text" name="newpost_intro" placeholder="Make it interesting!" value="<?php echo $current_intro; ?>"/>
							<p class="input_descr">Body</p>
							
							<textarea name="newpost_body" placeholder="Now write something nice!"><?php echo $current_body; ?></textarea>
							
							<p class="input_descr">Image</p>
							<input type="file" name="fileToUpload" id="fileToUpload" />

							<p class="input_descr">Color banner</p>
							<p class="input_descr3">Please enter values from 0 to 255 for each color</p>
							
							<div class="box">
								<p class="input_descr2">Red:</p>
								<input type="text" name="in_red" value="<?php echo $r; ?>"/>
							</div>
							
							<div class="box">
								<p class="input_descr2">Green:</p>
								<input type="text" name="in_green" value="<?php echo $g; ?>"/>
							</div>
							
							<div class="box">
								<p class="input_descr2">Blue:</p>
								<input type="text" name="in_blue" value="<?php echo $b; ?>"/>
							</div>

							<input type="submit" value="Post!"/>
						</form>
					</div>
					<style>

						.input_descr, .input_descr2, .input_descr3 {
							font-family: sans-serif;
						}
						.input_descr {
							font-size: 18px;
							margin-top: 30px;
						}
						.input_descr2, .input_descr3 {
							font-size: 14px;
						}
						.box {
							display: inline-block;
							position: relative;
							bottom: 50px;
						}
						#menu_wrapper {
							margin: auto;
	    					width: 60%;
						}
						#page_title {
	    					font-size: 30px;
	    					font-family: Helvetica;
	    					text-align: center;
	    					margin-top: 50px;
						}
						input[type="file"] {
							position: relative;
							bottom: 100px;
						}
						input[type="submit"] {
							text-align: center;
							color: #FFFFFF;
							background-color: #525259;
							border-radius: 40px;
							border: 1px solid #979797;
							font-size: 17px;
							padding: 12px;
							padding-left: 30px;
							padding-right: 30px;
							position: relative;
							left: 100px;
							margin-top: 100px;
							margin-bottom: 60px;
						}
						input[type="submit"]:hover {
							cursor: pointer; 
							cursor: hand;
						}
						input[type="text"], textarea {
							padding: 10px;
							border: solid 1px #dcdcdc;
							transition: box-shadow 0.3s, border 0.3s;
							display: block;
							margin: 0;
							width: 100%;
							font-family: sans-serif;
							font-size: 18px;
							appearance: none;
							box-shadow: none;
							border-radius: none;
						}
						input[type="text"]:focus, input[type="text"].focus, textarea:focus, textarea.focus {
							border: solid 1px #707070;
							box-shadow: 0 0 5px 1px #969696;
						}
						input[type="text"]:focus, textarea:focus {
							outline: none;
						}
						textarea {
							height: 300px;
							margin-bottom: 50px;
						}
						input[type="text"]:focus::-webkit-input-placeholder, textarea:focus::-webkit-input-placeholder, textarea:focus::-webkit-input-placeholder { 
							color:transparent; 
						}
						input[name="in_red"], input[name="in_green"], input[name="in_blue"] {
							width: 3em;
						}
						input[type="file"] {
							position: relative;
							top: 1px;
						}
					</style>

					<?php
				} elseif ($_GET["choice"] == "add_user") {
					
					?>


					<div id="menu_wrapper">
						<p id="page_title">Create new user</p>

						<form method="post" action="edit_users.php?mode=create">
							<p class="input_descr">Username</p>
							<p class="input_descr2">Has to be unique!</p>
							<input type="text" name="new_user_username" placeholder="What will you call him/her?" value="<?php echo $current_title; ?>" />
							<p class="input_descr">Firstname</p>
							<input type="text" name="new_user_firstname" placeholder="What is his/her name?" value="<?php echo $current_intro; ?>"/>
							<p class="input_descr">Lastname</p>
							<input type="text" name="new_user_lastname" placeholder="Make is his/her family name?" value="<?php echo $current_intro; ?>"/>
							<p class="input_descr">Password</p>
							<input type="password" name="new_user_password" placeholder="Give him/her a password!" value="<?php echo $current_intro; ?>"/>
							<div id="center">
							<input type="submit" value="Create!"/>
							</div>
						</form>
					</div>
					<style>
						#center {
							width: 20%;
							margin: auto;
						}

						.input_descr {
							font-family: sans-serif;
							font-size: 18px;
							margin-top: 30px;
						}
						.input_descr2 { 
							font-family: sans-serif;
							font-size: 14px;
							color: #747474;
						}
						#menu_wrapper {
							margin: auto;
	    					width: 60%;
						}
						#page_title {
	    					font-size: 30px;
	    					font-family: Helvetica;
	    					text-align: center;
	    					margin-top: 50px;
						}
						input[type="submit"] {
							text-align: center;
							color: #FFFFFF;
							background-color: #525259;
							border-radius: 40px;
							border: 1px solid #979797;
							font-size: 17px;
							padding: 12px;
							padding-left: 30px;
							padding-right: 30px;
							position: relative;
							margin-top: 100px;
							margin-bottom: 60px;

						}
						input[type="submit"]:hover {
							cursor: pointer; 
							cursor: hand;
						}
						input[type="text"], input[type="password"] {
							padding: 10px;
							border: solid 1px #dcdcdc;
							transition: box-shadow 0.3s, border 0.3s;
							display: block;
							margin: 0;
							width: 100%;
							font-family: sans-serif;
							font-size: 18px;
							appearance: none;
							box-shadow: none;
							border-radius: none;
						}
						input[type="text"]:focus, input[type="text"].focus, input[type="password"]:focus, input[type="password"].focus {
							border: solid 1px #707070;
							box-shadow: 0 0 5px 1px #969696;
						}
						input[type="text"]:focus, input[type="password"]:focus {
							outline: none;
						}
						input[type="text"]:focus::-webkit-input-placeholder, input[type="password"]:focus::-webkit-input-placeholder { 
							color:transparent; 
						}
					</style>




					<?php

				} elseif ($_GET["choice"] == "delete_user") {
					?>

						<div id="menu_wrapper">
						<p id="page_title">Users</p>
						<form method="post" action="">
					<?php
					require 'connToMySQL.php';
					$MySQLObj = new MySQL_Handler();
					$MySQLObj->mysql_connect();
					
					$result = $MySQLObj->conn->query("SELECT count(*) FROM Users WHERE user_type=1;");
					$count = $result->fetch_row();
					$count = $count[0];

					$result = $MySQLObj->conn->query("SELECT user_id, username, firstname, lastname FROM Users WHERE user_type=1");

					for ($i=0; $i < $count; $i++) { 
						$dict = $result->fetch_assoc();
					?>

						<div class="user_box">
							<p>Userid: <?php echo $dict["user_id"];?></p>
							<p>Username: <?php echo $dict["username"];?></p>
							<p>Firstname: <?php echo $dict["firstname"];?></p>
							<p>Lastname: <?php echo $dict["lastname"];?></p>
							<p>Delete: </p><input type="checkbox" name="delete_user_id_<?php echo $dict["user_id"]; ?>" />
						</div>

						<?php
							if ($i != $count -1) {
						?>
						<div class="separator"></div>
						<?php
							}
						?>
					
					<?php
						}
					?>
					<div id="input_boxes"><input type="submit" value="Delete"/></div>
					</form>
					</div>
					
					<style>
						input[type="submit"] {
							text-align: center;
							color: #FFFFFF;
							background-color: rgba(177, 0, 0, 0.7);
							border-radius: 40px;
							border: 1px solid rgba(177, 0, 0, 0.7);
							font-size: 17px;
							padding: 12px;
							padding-left: 30px;
							padding-right: 30px;
							position: relative;
							top: 40px;
							
						}

						input[type="submit"]:hover {
							cursor: pointer; 
							cursor: hand;
						}
						#input_boxes {
							width: 15%;
							margin: auto; 
							margin-bottom: 100px;
							margin-top: 20px;

						}
						#page_title {
							text-align: center;
							font-size: 24px;
							margin: 40px;
						}
						.user_box > p {
							display: inline-block;
							margin: 10px;
						}
						.user_box {
							width: 90%;
							margin: auto;
						}
						.separator {
							width: 100%;
							background-color: black;
							height: 2px;
						}
						#menu_wrapper {
							margin: auto;
	    					width: 60%;
						}
					</style>
					<?php
				} else {
					# invalid choice
					header('location:control_panel.php?error=some_error');
					exit();
				}
				?>

				<?php
			} else {
				# Hasnt selected from menu
				?>
				<div id="menu_wrapper">
					<p id="control_menu">Menu</p>

					<a href="control_panel.php?choice=blogpost"><p class="p_choices">Make new blogpost</p></a>
					<a href="control_panel.php?choice=add_user"><p class="p_choices">Create user</p></a>
					<a href="control_panel.php?choice=delete_user"><p class="p_choices">Delete user</p></a>
				</div>
				
				
				<style>
					#control_menu {
    					font-size: 30px;
    					font-family: Helvetica;
    					text-align: center;
					}
					#menu_wrapper {
						margin: auto;
    					width: 60%;
					}
					.p_choices {
						font-family: Helvetica;
						font-size: 20px;
						color: black;
						display: inline-block;
						text-align: center;
						margin-right: 100px;
						position: relative;
						left: 170px;
					}
					a {
						text-decoration: none;
					}
				</style>

			<?php
			}
			?>


	<?php
		} else {
			# Isnt admin
			header('location:login_page.php?error=some_error');
			exit();
		}
	}
	
?>

<?php
	include 'footer.php';
	require 'error.php';
?>