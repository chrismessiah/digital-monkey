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
						<p id="page_title"><tag class="menu_new_blogpost">Make new blogpost</tag></p>

						<form method="post" action="blogposter.php<?php echo $mode; ?>" enctype="multipart/form-data">
							<p class="input_descr"><tag class="blogpost_title"></tag></p>
							<input type="text" name="newpost_title" value="<?php echo $current_title; ?>" />
							<p class="input_descr"><tag class="blogpost_intro"></tag></p>
							<input type="text" name="newpost_intro" value="<?php echo $current_intro; ?>"/>
							<p class="input_descr"><tag class="blogpost_body"></tag></p>
							
							<textarea name="newpost_body"><?php echo $current_body; ?></textarea>
							
							<p class="input_descr"><tag class="blogpost_image"></tag></p>
							<input type="file" name="fileToUpload" id="fileToUpload" />

							<p class="input_descr"><tag class="blogpost_banner"></tag></p>
							<p class="input_descr3"><tag class="blogpost_banner_descr"></tag></p>
							
							<div class="box">
								<p class="input_descr2"><tag class="blogpost_banner_r"></tag></p>
								<input type="text" name="in_red" value="<?php echo $r; ?>"/>
							</div>
							
							<div class="box">
								<p class="input_descr2"><tag class="blogpost_banner_g"></tag></p>
								<input type="text" name="in_green" value="<?php echo $g; ?>"/>
							</div>
							
							<div class="box">
								<p class="input_descr2"><tag class="blogpost_banner_b"></tag></p>
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

					$page_title = '<tag class="user_create_title"></tag>';
					if ($_GET["choice"] == "change_user") {
						$page_title = '<tag class="user_edit_title"></tag>';
					}

					?>

					<div id="menu_wrapper">
						<p id="page_title"><?php echo $page_title; ?></p>
						<p id="page_title2"><tag class="user_create_current"></tag></p>

						<?php
							require 'connToMySQL.php';
							$MySQLObj = new MySQL_Handler();
							$MySQLObj->mysql_connect();
							$result = $MySQLObj->conn->query("SELECT count(*) FROM Users WHERE user_id <>'".$_SESSION["user_id"]."' AND username <>'admin';");
							$count = $result->fetch_row();
							$count = $count[0];

							$result = $MySQLObj->conn->query("SELECT user_id, username, firstname, lastname, user_type FROM Users WHERE user_id <>'".$_SESSION["user_id"]."' AND username <>'admin';");

							for ($i=0; $i < $count; $i++) { 
							$dict = $result->fetch_assoc();
						?>

						<div class="user_box">
							<p><tag class="user_create_name"></tag><?php echo $dict["firstname"]; ?> <?php echo $dict["lastname"]; ?></p>
							<p><tag class="user_create_username"></tag><?php echo ": ".$dict["username"]; ?></p>
							<?php
								if ($dict["user_type"] == 0) { ?>
									<p><tag class="user_create_super"></tag></p>
								<?php }
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
								$MySQLstatement = $MySQLObj->conn->prepare("SELECT username, firstname, lastname, user_type FROM Users WHERE user_id=? AND username <>'admin';");
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
							<p class="input_descr"><tag class="user_create_username"></tag></p>
							<p class="input_descr2"><tag class="user_username_descr"></tag></p>
							<input type="text" name="new_user_username" value="<?php echo $container_username; ?>" />
							<p class="input_descr"><tag class="user_create_firstname"></tag></p>
							<input type="text" name="new_user_firstname" value="<?php echo $container_firstname; ?>"/>
							<p class="input_descr"><tag class="user_create_lastname"></tag></p>
							<input type="text" name="new_user_lastname" value="<?php echo $container_lastname; ?>"/>
							<p class="input_descr"><tag class="user_create_pwd"></tag></p>
							<input type="password" name="new_user_password"/>
							<p class="input_descr3"><tag class="user_create_su"></tag>: </p><input type="checkbox" name="superuser_priv" <?php echo $container_su; ?> />
							
							<div id="center">
								<?php
									$val = '<tag class="user_create_button"></tag>';
									if ($_GET["choice"] == "change_user") {
										$val = '<tag class="user_edit_button"></tag>';
									}
								?>
								<button type="submit"><?php echo $val; ?></button>

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
						button[type="submit"] {
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
						button[type="submit"]:hover {
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
						<p id="page_title"><tag class="user_create_current"></tag></p>
						<form method="post" action="edit_users.php?mode=edit">
					<?php
					require 'connToMySQL.php';
					$MySQLObj = new MySQL_Handler();
					$MySQLObj->mysql_connect();
					
					$result = $MySQLObj->conn->query("SELECT count(*) FROM Users WHERE user_id <>'".$_SESSION["user_id"]."' AND username <>'admin';");
					$count = $result->fetch_row();
					$count = $count[0];

					$result = $MySQLObj->conn->query("SELECT user_id, username, firstname, lastname, user_type FROM Users WHERE user_id <>'".$_SESSION["user_id"]."' AND username <>'admin';");

					for ($i=0; $i < $count; $i++) { 
						$dict = $result->fetch_assoc();
					?>

						<div class="user_box">
							<p><tag class="user_create_name"></tag><?php echo $dict["firstname"];?> <?php echo $dict["lastname"];?></p>
							<p><tag class="user_create_username"></tag><?php echo ": ".$dict["username"];?></p>
							<p><tag class="user_create_id"></tag><?php echo ": ".$dict["user_id"];?></p>
							<?php
								if ($dict["user_type"] == 0) {
									echo "<p>".'<tag class="user_create_super"></tag>'."</p>";
								}
							?>
							<p><tag class="user_create_select"></tag><?php echo ": "; ?></p><input type="radio" name="selected_user_id" value="<?php echo $dict["user_id"]; ?>" />
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
					<div id="input_boxes"><button type="submit" name="edit"><tag class='button_edit'></tag></button></div>
					<div id="input_boxes"><button type="submit" name="delete"><tag class='button_delete'></tag></button></div>
					</form>
					</div>
					
					<style>
						button[type="submit"] {
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

						button[type="submit"]:hover {
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
						button[name="edit"] {
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
					<p id="control_menu"><tag class="menu"></tag></p>

					<a href="control_panel.php?choice=blogpost"><p class="p_choices"><tag class="menu_new_blogpost"></tag></p></a>
					<style>
					#menu_wrapper {
    					width: 47%;
					}
					</style>
					<?php 
						if ($_SESSION["user_type"] == 0) {
					?>

					<a href="control_panel.php?choice=add_user"><p class="p_choices"><tag class="menu_new_c_user"></tag></p></a>
					<a href="control_panel.php?choice=edit_user"><p class="p_choices"><tag class="menu_new_e_user"></tag></p></a>
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