<?php
	require 'session.php';
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
	?>

			<a href="courses.php"><p class="head_menu">Kurser</p></a>
			<a href="schedule.php"><p class="head_menu">Schema</p></a>
			<a href="results.php"><p class="head_menu">Resultat</p></a>
			<a href="index.php"><p class="head_menu">Översikt</p></a>
			<a href="other.php"><p class="head_menu">Övrigt</p></a>

			<a href="profile.php">
				<div id="profile_pic"></div>
			</a>
	<?php 
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
	#profile_pic, #kth_logo {
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
		background-image: url("<?=$_SESSION['pic_path']?>");
		left: 47%;
		top: 15px;
		overflow:hidden;
		border-radius: 100px;
		background-size: 60px 60px;

	}
</style>


















