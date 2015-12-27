<div id="foot_div">
	<div id="text_wrapper">
		<?php echo text_format_this($lang["footer_text"]); ?>
	</div>

	<div id="images_block">
		<div class="person_block">
			<a href="https://se.linkedin.com/in/christianabdelmassih">
				<div id="foot_chris"></div>
			</a>
			<p class="person_text">Christian Abdelmassih<br><a href="mailto:chrabd@kth.se">chrabd@kth.se</a></p>
		</div>
		
		<div class="person_block">
			<a href="https://se.linkedin.com/in/adelina-tahiri-728b55a1">
				<div id="foot_adde"></div>
			</a>
			<p class="person_text">Adelina Tahiri<br><a href="mailto:tahiri@kth.se">tahiri@kth.se</a></p>
		</div>
	</div>
</div>

<style>
	ul {
    list-style: none;
    padding:0;
    margin:0;
	}
	li { 
	    padding-left: 2em; 
	    text-indent: -.7em;
	}
	li:before {
	    content: "• ";
	    color: white; /* or whatever color you prefer */
	}
	.foot_p, .person_text {
		font-family: Helvetica;
		color: #FFFFFF;
		line-height: 29px;
		margin: 0px;
	}
	.foot_p {
		font-size: 20px;
	}
	.person_text {
		font-size: 20px;
		text-align: center;
	}
	a {
		text-decoration: none;
		color: #FFFFFF
	}
	.person_block {
		display: inline-block;
	}
	#text_wrapper {
		margin: auto;
    	width: 60%;
    	padding: 20px;
	}
	#foot_div {
		background: #353535;
	}
	#images_block {
		width: 50%;
    	margin: 0 auto;
    	padding-bottom: 50px;
	}

	#foot_chris, #foot_adde {
		display: inline-block;
		margin-top: 10px;
		width: 246px;
		height: 246px;
		position: relative;
		left: 5%;
		border-radius: 100px;
		background-size: 246px 246px;
		overflow:hidden;
		margin: 20px;
		
	}
	
	#foot_chris {background-image: url("public/footer/chris.png");}
	#foot_adde {background-image: url("public/footer/adde.png");}
</style>