<?php
	require 'header.php';
?>


<div id="login-bg">
	
	<div id="login_wrapper">
		<form method="post" action="login.php"> <!-- collects user input -->
			<input type="text" name="field1" placeholder="Username"/>

			<input type="password" name="field2" placeholder="Password"/>
			<a href="login_page.php?error=forgot_pwd"><p id="login_pass_forgot">Forgot password?</p></a>
			<input type="submit" value="Login"/>
		</form>
	</div>

</div>


<style>
	#login_wrapper {
		position: relative;
		margin: auto;
	    width: 32%;
	    top: 400px;
	}
	#login_pass_forgot {
		color: #FFFFFF;
		font-family: Helvetica;
		position: relative;
		left: 280px;
	}
	input[type="submit"]:hover {
		cursor: pointer; 
		cursor: hand;
	}
	#login-bg {
		background-image: url("public/Albert-Einstein-genius-copy.jpg");
		height: 800px;
		background-size: 1294px;
		background-repeat: no-repeat;
	}
	input[type="text"], input[type="password"] {
		background: #FFFFFF;
		border: 1px solid #979797;
		border-radius: 40px;
		font-size: 16px;
		font-family: Helvetica;
		margin: 0;
    	outline: 0;
    	padding: 12px;
    	color:#525259; /* Textcolor */
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
		left: 150px;
	}
	a {
		text-decoration: none;
	}

	/* Hides placeholder */
	input[type="text"]:focus::-webkit-input-placeholder, input[type="password"]:focus::-webkit-input-placeholder { 
		color:transparent; 
	}
</style>

	

<?php
	require 'footer.php';
	require 'error.php';
?>


















