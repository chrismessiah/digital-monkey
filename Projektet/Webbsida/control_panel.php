<?php
	require 'header.php';
	error_reporting(E_ALL);

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
						<p id="page_title"><?php echo $lang["menu_new_blogpost"];?></p>

						<form method="post" action="blogposter.php<?php echo $mode; ?>" enctype="multipart/form-data">
							<p class="input_descr"><?php echo $lang["blogpost_title"];?></p>
							<input type="text" name="newpost_title" placeholder="What will you call it?" value="<?php echo $current_title; ?>" />
							<p class="input_descr"><?php echo $lang["blogpost_intro"];?></p>
							<input type="text" name="newpost_intro" placeholder="Make it interesting!" value="<?php echo $current_intro; ?>"/>
							<p class="input_descr"><?php echo $lang["blogpost_body"]; ?></p>
							
							<textarea name="newpost_body" placeholder="Now write something nice!"><?php echo $current_body; ?></textarea>
							
							<p class="input_descr"><?php echo $lang["blogpost_image"]; ?></p>
							<input type="file" name="fileToUpload" id="fileToUpload" />

							<p class="input_descr"><?php echo $lang["blogpost_banner"]; ?></p>
							<p class="input_descr3"><?php echo $lang["blogpost_banner_descr"]; ?></p>
							
							<div class="box">
								<p class="input_descr2"><?php echo $lang["blogpost_banner_r"]; ?></p>
								<input type="text" name="in_red" value="<?php echo $r; ?>"/>
							</div>
							
							<div class="box">
								<p class="input_descr2"><?php echo $lang["blogpost_banner_g"]; ?></p>
								<input type="text" name="in_green" value="<?php echo $g; ?>"/>
							</div>
							
							<div class="box">
								<p class="input_descr2"><?php echo $lang["blogpost_banner_b"];?></p>
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
					
				} elseif (($_GET["choice"] == "add_user"||$_GET["choice"] == "change_user") && $_SESSION["user_type"] == 0) {
					if (isset($_GET["id"])) {
						if (!is_numeric($_GET["id"])) {
							header('location:http://localhost/projects/XML/Webbsida/control_panel.php?choice=edit_user&error=no_user_edited');
						}
					}

					$page_title = $lang["user_create_title"];
					if ($_GET["choice"] == "change_user") {
						$page_title = $lang["user_edit_title"];
					}

					?>

					<div id="menu_wrapper">
						<p id="page_title"><?php echo $page_title; ?></p>
						<p id="page_title2"><?php echo $lang["user_create_current"]; ?></p>

						<?php
							require 'connToMySQL.php';
							$MySQLObj = new MySQL_Handler();
							$MySQLObj->mysql_connect();
							$result = $MySQLObj->conn->query("SELECT count(*) FROM Users WHERE user_id <>'".$_SESSION["user_id"]."';");
							$count = $result->fetch_row();
							$count = $count[0];

							$result = $MySQLObj->conn->query("SELECT user_id, username, firstname, lastname, user_type FROM Users WHERE user_id <>'".$_SESSION["user_id"]."';");

							for ($i=0; $i < $count; $i++) { 
							$dict = $result->fetch_assoc();
						?>

						<div class="user_box">
							<p><?php echo $lang["user_create_name"].": ".$dict["firstname"];?> <?php echo $dict["lastname"];?></p>
							<p><?php echo $lang["user_create_username"].": ".$dict["username"];?></p>
							<?php
								if ($dict["user_type"] == 0) {
									echo "<p>".$lang["user_create_super"]."</p>";
								}
							?>
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
						<style>
							.user_box > p {
								display: inline-block;
								margin: 10px;
							}
							.user_box {
								width: 80%;
								margin: auto;
							}
							.separator {
								width: 80%;
								background-color: black;
								height: 2px;
								margin: auto;
							}
						</style>

						<?php
						$container_username = "";
						$container_firstname = "";
						$container_lastname = "";
						$container_su = "";
						$form_action = "edit_users.php?mode=create";
						if ($_GET["choice"] == "change_user") {						
							if (is_numeric($_GET["id"])) {
								$form_action = "edit_users.php?mode=edit&id=".$_GET["id"];
								$MySQLstatement = $MySQLObj->conn->prepare("SELECT username, firstname, lastname, user_type FROM Users WHERE user_id=?");
								$MySQLstatement->bind_param("s", $_GET["id"]);
								$MySQLstatement->execute();
								$result = $MySQLstatement->get_result();
								$dict = $result->fetch_assoc();
								$container_username = $dict["username"];
								$container_firstname = $dict["firstname"];
								$container_lastname = $dict["lastname"];
								if ($dict["user_type"] == 0) {
									$container_su = "checked";
								}
							}
						}
						?>

						<form method="post" action="<?php echo $form_action; ?>">
							<p class="input_descr"><?php echo $lang["user_create_username"]; ?></p>
							<p class="input_descr2"><?php echo $lang["user_username_descr"];?></p>
							<input type="text" name="new_user_username" placeholder="<?php echo $lang['user_username_placeholder'];?>" value="<?php echo $container_username; ?>" />
							<p class="input_descr"><?php echo $lang["user_create_firstname"];?></p>
							<input type="text" name="new_user_firstname" placeholder="<?php echo $lang['user_firstname_placeholder'];?>" value="<?php echo $container_firstname; ?>"/>
							<p class="input_descr"><?php echo $lang["user_create_lastname"]; ?></p>
							<input type="text" name="new_user_lastname" placeholder="<?php echo $lang['user_lastname_placeholder'];?>" value="<?php echo $container_lastname; ?>"/>
							<p class="input_descr"><?php echo $lang["user_create_pwd"];?></p>
							<input type="password" name="new_user_password" placeholder="<?php echo $lang['user_password_placeholder']; ?>"/>
							<p class="input_descr3"><?php echo $lang["user_create_su"];?>: </p><input type="checkbox" name="superuser_priv" <?php echo $container_su; ?> />
							<div id="center">

							<?php
								$val = "Create!";
								if ($_GET["choice"] == "change_user") {
									$val = "Apply!";
								}
							?>
							<input type="submit" value="<?php echo $val; ?>"/>
							</div>
						</form>
					</div>
					<style>
						form {
							margin-top: 70px;
						}
						#center {
							width: 20%;
							margin: auto;
						}

						.input_descr, .input_descr3 {
							font-family: sans-serif;
							font-size: 18px;
							margin-top: 30px;
						}
						.input_descr3 {
							display: inline-block;
							margin-right: 15px;
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
						#page_title2 {
							font-size: 22px;
							font-family: Helvetica;
							margin-top: 70px;
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

				} elseif ($_GET["choice"] == "edit_user" && $_SESSION["user_type"] == 0) {
					?>

						<div id="menu_wrapper">
						<p id="page_title">Users</p>
						<form method="post" action="edit_users.php?mode=edit">
					<?php
					require 'connToMySQL.php';
					$MySQLObj = new MySQL_Handler();
					$MySQLObj->mysql_connect();
					
					$result = $MySQLObj->conn->query("SELECT count(*) FROM Users WHERE user_id <>'".$_SESSION["user_id"]."';");
					$count = $result->fetch_row();
					$count = $count[0];

					$result = $MySQLObj->conn->query("SELECT user_id, username, firstname, lastname, user_type FROM Users WHERE user_id <>'".$_SESSION["user_id"]."';");

					for ($i=0; $i < $count; $i++) { 
						$dict = $result->fetch_assoc();
					?>

						<div class="user_box">
							<p><?php echo $lang["user_create_name"].$dict["firstname"];?> <?php echo $dict["lastname"];?></p>
							<p><?php echo $lang["user_create_username"].": ".$dict["username"];?></p>
							<p><?php echo $lang["user_create_id"].": ".$dict["user_id"];?></p>
							<?php
								if ($dict["user_type"] == 0) {
									echo "<p>".$lang["user_create_super"]."</p>";
								}
							?>
							<p><?php echo $lang["user_create_select"].": "; ?></p><input type="radio" name="selected_user_id" value="<?php echo $dict["user_id"]; ?>" />
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
					<div id="input_boxes"><input type="submit" value="<?php echo $lang["button_edit"]; ?>" name="edit" /></div>
					<div id="input_boxes"><input type="submit" value="<?php echo $lang["button_delete"]; ?>" name="delete" /></div>
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
							display: inline-block;
							position: relative;
							left: 40%
						}
						input[value="Edit"] {
							background-color: rgba(101, 180, 169, 0.7);
							border: 1px solid rgba(101, 180, 169, 0.7);
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
							width: 70%;
							margin: auto;
						}
						.separator {
							width: 80%;
							background-color: black;
							height: 2px;
							margin: auto;
						}
						#menu_wrapper {
							margin: auto;
	    					width: 80%;
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

			} elseif ($_SESSION["user_type"] == 0||$_SESSION["user_type"] == 1) {
				
				# Hasnt selected from menu
				?>
				<div id="menu_wrapper">
					<p id="control_menu"><?php echo $lang["menu"]; ?></p>

					<a href="control_panel.php?choice=blogpost"><p class="p_choices"><?php echo $lang["menu_new_blogpost"]; ?></p></a>
					<style>
					#menu_wrapper {
    					width: 47%;
					}
					</style>
					<?php 
						if ($_SESSION["user_type"] == 0) {
					?>

					<a href="control_panel.php?choice=add_user"><p class="p_choices"><?php echo $lang["menu_new_c_user"]; ?></p></a>
					<a href="control_panel.php?choice=edit_user"><p class="p_choices"><?php echo $lang["menu_new_e_user"]; ?></p></a>
					<style>
					#menu_wrapper {
    					width: 78%;
					}
					</style>
					<?php
						}
					?>
				</div>
				
				<style>
					#control_menu {
    					font-size: 30px;
    					font-family: Helvetica;
    					text-align: center;
					}
					#menu_wrapper {
						margin: auto;
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
			} else {
				header('location:index.php?error=some_error');
			}
			?>


	<?php
	}
	
?>

<?php
	include 'footer.php';
	require 'error.php';
?>