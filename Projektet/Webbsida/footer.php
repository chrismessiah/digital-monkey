<?php
	$footer_text = "Labore admodum quo ea. Prima rationibus sit at, eam iudico veniam eloquentiam cu. Putent cetero electram et eam, mea cu integre aliquando vulputate. Te ius alia soluta patrioque, ad debet paulo vituperata per, nostrud utroque voluptua mei ne.Mel nullam bonorum ad, quo utamur patrioque scribentur an. Vel et facer apeirian interesset, id vis porro vulputate, est nemore persius inciderint ei. Eu graeci dictas vis. In nostro praesent sea, ei quas disputando suscipiantur sea, mei choro dolor dissentiet ad.";
?>

<div id="foot_div">
	<div id="foot_textbox">
		<p id="foot_p"><?php echo $footer_text; ?></p>
	</div>
	
	<a href="https://se.linkedin.com/in/christianabdelmassih">
		<div id="foot_chris"></div>
	</a>
	
	<a href="https://se.linkedin.com/in/adelina-tahiri-728b55a1">
		<div id="foot_adde"></div>
	</a>
</div>

<style>
	#foot_div {
		background: #353535;
	}
	#foot_textbox {
		display: inline-block;
		width: 730px;
		height: 246px;
	}

	#foot_chris, #foot_adde {
		margin-top: 10px;
		display: inline-block;
		width: 246px;
		height: 246px;
		position: relative;
		left: 5%;
		border-radius: 100px;
		background-size: 246px 246px;
		overflow:hidden;
		
	}
	
	#foot_chris {background-image: url("public/footer/chris.png");}
	#foot_adde {background-image: url("public/footer/adde.png");}
	
	#foot_p {
		font-family: Helvetica;
		font-size: 24px;
		color: #FFFFFF;
		line-height: 29px;
		margin: 5px;
	}
</style>