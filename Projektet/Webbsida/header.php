<?php
	ob_start();
	require 'session.php';

	# HANTERA DESSA. 
	# 1 = Student
	# 2 = Teacher
	# 3 = Examinator
	# 4 = Course admin
	# 0 = System admin
?>

<div id="head_div">
	<a href="index.php">
		<div id="kth_logo"></div>
	</a>

	<?php 
		if ( $_SESSION["logged_in"] == false ) {
	?>
			<a href="login_page.php"><p class="head_menu">Log in</p></a>
		
			<style>
				.head_menu {
					left: 80%;
				}
			</style>
	
	<?php 
		} else { 
			if ( $_SESSION["user_type"] == 0||$_SESSION["user_type"] == 1 ) {
				# admin or logged in
				?>

				<a href="control_panel.php"><p class="head_menu">Kontrollpanel</p></a>
				<a href="profile.php">
					<div id="profile_pic"></div>
				</a>
				<style>
					.head_menu {
						left: 37%;
					}
					#profile_pic {
						position: relative;
						left: 900px;
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


















