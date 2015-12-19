<?php 
	echo session_status();
	session_start();
	if  (!isset($_COOKIE['logged_in']) && !isset($_COOKIE['username'])) {
		echo "Session now started";
    	$_SESSION["logged_in"] = false;
    	$_SESSION["username"] = "";
	} else {
		echo "Session ALREADY STARTED";
		echo session_status();
		echo $_SESSION["logged_in"];
		echo $_SESSION["username"];
	}
?>

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
	
	<?php } else { ?>

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
	<?php } ?>

</div>


<style>
	body {
		margin: 0px;
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


