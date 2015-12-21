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
				} if ($_GET["choice"] == "add_user") {
					# choice 2
				} else {
					# invalid choice
					header('location:control_panel.php?error=some_error');
				}
				?>

				<?php
			} else {
				# Hasnt selected from menu
				?>
				<div id="menu_wrapper"><p id="control_menu">Menu</p></div>
				<a href="control_panel?choice=blogpost"><p></p></a>
				
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