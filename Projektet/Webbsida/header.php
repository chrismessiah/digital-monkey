<?php
	ob_start();
	header('Content-Type: text/html; charset=utf-8');
	require 'session.php';

	# HANTERA DESSA. 
	# 1 = Editor
	# 0 = System admin
?>

<div id="head_div">
	<a href="index.php">
		<div id="kth_logo"></div>
	</a>
	<a href="xml_validate.php"><p id="head_menu2">Export to XML</p></a>
	<style>
		#head_menu2 {
			display: inline-block;
			font-family: Helvetica;
			font-size: 24px;
			color: #FFFFFF;
			position: relative;
			line-height: 29px;
			bottom: 10px;
			left: 30px;
		}
	</style>

	<?php 
		if ( $_SESSION["logged_in"] == false ) {
	?>
			<a href="login_page.php"><p class="head_menu">Log in</p></a>
		
			<style>
				.head_menu {
					left: 70%;
				}
			</style>
	
	<?php 
		} else { 
			if ( $_SESSION["user_type"] == 0||$_SESSION["user_type"] == 1 ) {
				# admin or logged in
				?>

				<a href="control_panel.php"><p class="head_menu">Kontrollpanel</p></a>
				<a href="">
					<div id="profile_pic"></div>
				</a>
				<style>
					.head_menu {
						left: 30%;
					}
					#profile_pic {
						position: relative;
						left: 800px;
						top: 15px;
					}
				</style>

			<?php
			}
		} 
		?>

</div>


<style>
	body {
		margin: 0px;
	}
	.head_menu {
		display: inline-block;
		font-family: Helvetica;
		font-size: 24px;
		color: #FFFFFF;
		position: relative;
		line-height: 29px;
		margin-left: 20px;
		bottom: 10px;
	}
	#head_div {
		background: #525259;
	}
	#kth_logo {
		width: 60px;
		height: 60px;
		display: inline-block;
		position: relative;
		left: 15px;
		top: 15px;
		background-repeat: no-repeat;
	}
	#kth_logo {
		background-image: url("public/header/kth.png");
		left: 15px;
		top: 15px;
		background-size: 50px 50px;
	}
	#profile_pic {
		display: inline-block;
		width: 60px;
		height: 60px;
		background-image: url("<?php echo $_SESSION['pic_path']; ?>");
		overflow:hidden;
		border-radius: 100px;
		background-size: 60px 60px;
		background-repeat: no-repeat;

	}
</style>


















