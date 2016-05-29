<div id="head_div">
	<a href="/">
		<div id="kth_logo"></div>
	</a>
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

	@if (true)
  {{-- @if ($_SESSION["logged_in"] == false) --}}
		<a href="/login"><p class="head_menu">Log in</p></a>
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

  {{-- admin or logged in --}}
	@elseif(false)
  {{-- @elseif($_SESSION["user_type"] == 0||$_SESSION["user_type"] == 1) --}}
		<a href="control_panel.php"><p class="head_menu">Control Panel</p></a>
		<a href="">
			<div id="profile_pic"></div>
		</a>
		<a href="log_out.php"><p id="head_menu3">Log out</p></a>
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
				background-image: url("/images/profile_pictures/");
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
	@endif
		<a href="set_lang.php"><p id="head_menu4">Change to Swedish</p></a>
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
		background-image: url("/images/icons/kth.png");
		left: 15px;
		top: 15px;
		background-size: 50px 50px;
	}
</style>
