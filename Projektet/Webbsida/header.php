<div id="head_div">
	<a href="index.php">
		<div id="kth_logo"></div>
	</a>

	<?php 
		if ( !$_SESSION["logged_in"] ) {
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

			<a href=""><p class="head_menu">Kurser</p></a>
			<a href=""><p class="head_menu">Schema</p></a>
			<a href=""><p class="head_menu">Resultat</p></a>
			<a href=""><p class="head_menu">Översikt</p></a>
			<a href=""><p class="head_menu">Övrigt</p></a>
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
	}
	#kth_logo {
		background-image: url("public/header/kth.png");
		width: 60px;
		height: 60px;
		display: inline-block;
		position: relative;
		left: 15px;
		top: 15px;
	}
	#head_div {
		background: #525259;
	}
</style>


