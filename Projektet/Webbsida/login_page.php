<?php
	require 'header.php';
?>


<div id="login-bg">
	<div id="login_wrapper">
		<form method="post" action="login.php"> <!-- collects user input -->
			<div id="input_boxes">
				<input type="text" name="field1" placeholder="<?php echo $lang["user_create_username"];?>"/>
				<input type="password" name="field2" placeholder="<?php echo $lang["user_create_pwd"];?>"/>
				<a href="login_page.php?error=forgot_pwd" id="login_pass_forgot"><?php echo $lang["user_create_pwd_fgt"];?></a>
				<div><input type="submit" value="<?php echo $lang['log_in'];?>"/></div>
			</div>

		</form>
	</div>

</div>


<style>
	#input_boxes {
		width: 60%;
		margin: auto;
	}

	#input_boxes > input {
		margin: 10px; 
	}
	#input_boxes > div {
		width: 50%;
		margin: auto; 
	}

	#login_wrapper {
		position: relative;
		margin: auto;
	    width: 32%;
	    top: 420px;
	}
	#login_pass_forgot {
		color: #FFFFFF;
		font-family: Helvetica;
		position: relative;
		left: 110px;
		font-size: 12px;
		margin: 0px;
	}
/*	.login_pass_forgot2 {
		color: #FFFFFF;
		font-family: Helvetica;
		position: relative;
		font-size: 14px;
		left: 20px;
		top: 15px;
	}*/
	
	input[type="submit"]:hover {
		cursor: pointer; 
		cursor: hand;
	}
	#login-bg {
		background-image: url("public/Albert-Einstein-genius-copy.jpg");
		height: 750px;
		background-size: 100%;
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
		top: 40px;
		
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


















