<?php
	require 'header.php';

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
					?>


					<div id="menu_wrapper">
						<p id="page_title">Make new blogpost</p>

						<form method="post" action="blogposter.php" enctype="multipart/form-data">
							<p class="input_descr">Title</p>
							<input type="text" name="newpost_title" placeholder="What will you call it?"/>
							<p class="input_descr">Introduction</p>
							<input type="text" name="newpost_intro" placeholder="Make it interesting!"/>
							<p class="input_descr">Body</p>
							
							<!-- <input type="text" name="newpost_body" placeholder="Now write something nice!"/> -->
							<textarea name="newpost_body" placeholder="Now write something nice!"></textarea>
							
							<p class="input_descr">Image</p>
							<input type="file" name="fileToUpload" id="fileToUpload" />
							
							<input type="submit" value="Post!"/>
						</form>
					</div>
					<style>
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
						.input_descr {
							font-family: sans-serif;
							font-size: 18px;
						}
						textarea {
							height: 300px
						}
						input[type="text"]:focus::-webkit-input-placeholder, textarea:focus::-webkit-input-placeholder, textarea:focus::-webkit-input-placeholder { 
							color:transparent; 
						}
					</style>

					<?php
				} elseif ($_GET["choice"] == "add_user") {
					# choice 2

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