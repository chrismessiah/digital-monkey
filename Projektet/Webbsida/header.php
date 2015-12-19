<?php ?>
<style>
	body {
		margin: 0px;
	}
</style>

<div id="head_div">
	<a href="index.php">
		<div id="kth_logo"></div>
	</a>

	<?php 
		// Set to false just to get something
		$logged_in = FALSE;
		if ($logged_in) {
	?>
			<p class="head_menu">Kurser</p>
			<p class="head_menu">Schema</p>
			<p class="head_menu">Resultat</p>
			<p class="head_menu">Översikt</p>
			<p class="head_menu">Övrigt</p>

			<style>
				.head_menu {
					display: inline-block;
					font-family: Helvetica;
					font-size: 24px;
					color: #FFFFFF;
					line-height: 29px;
					position: relative;
				} 
			</style>
	
	<?php } else { ?>
	
	<a href="login_page.php"><p class="head_menu">Log in</p></a>
	
	<style>
		.head_menu {
			display: inline-block;
			font-family: Helvetica;
			font-size: 24px;
			color: #FFFFFF;
			line-height: 29px;
			position: relative;
			left: 80%;
			display: inline-block;
		}
	</style>
	<?php } ?>

</div>


<style>
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


