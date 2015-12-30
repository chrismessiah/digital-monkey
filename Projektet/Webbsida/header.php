<?php
	ob_start();
	header('Content-Type: text/html; charset=utf-8');
	require 'session.php';
	require 'languagesOLD.php';
	require 'text_formatter.php';
	require 'languages_apply.php';

	# HANTERA DESSA. 
	# 1 = Editor
	# 0 = System admin
?>


<div id="head_div">
	<a href="index.php">
		<div id="kth_logo"></div>
	</a>
	<a href="xml_validate.php"><p id="head_menu2"><tag class="xml_export">Export to XML</tag></p></a>
	<style>
		#head_menu2 {
			display: inline-block;
			font-family: Helvetica;
			font-size: 24px;
			color: #FFFFFF;
			position: relative;
			line-height: 29px;
			bottom: 10px;
			left: 10px;
		}
	</style>

	<?php 
		if ( $_SESSION["logged_in"] == false ) {
	?>
			<a href="login_page.php"><p class="head_menu"><tag class="log_in">Log in</tag></p></a>
		
			<style>
				.head_menu {
					left: 70%;
				} #head_menu4 {
					display: inline-block;
					font-family: Helvetica;
					font-size: 24px;
					color: #FFFFFF;
					position: relative;
					line-height: 29px;
					bottom: 10px;
				}
			</style>
	
	<?php 
		} else { 
			if ( $_SESSION["user_type"] == 0||$_SESSION["user_type"] == 1 ) {
				# admin or logged in
				?>

				<a href="control_panel.php"><p class="head_menu"><tag class="control_panel">Control panel</tag></p></a>
				<a href="">
					<div id="profile_pic"></div>
				</a>
				<a href="log_out.php"><p id="head_menu3"><tag class="log_out">Log out</tag></p></a>
				<style>
					.head_menu {
						left: 25%;
					}
					#head_menu3 {
						left: 47%;
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
						position: relative;
						left: 800px;
						top: 15px;
					}
					#head_menu4 {
						display: inline-block;
						font-family: Helvetica;
						font-size: 24px;
						color: #FFFFFF;
						position: relative;
						line-height: 29px;
						bottom: 10px;
						right: 20%
					}
				</style>

			<?php
			}
		} 
		?>
		<a href="set_lang.php"><p id="head_menu4"><tag class="change_lange">Byt till Svenska</tag></p></a>
</div>


<style>
	body {
		margin: 0px;
	}
	.head_menu, #head_menu2, #head_menu3 {
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
</style>


















