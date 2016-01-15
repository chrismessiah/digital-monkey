<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">

<!-- Space: &#160; -->
	<xsl:template match="/">
		<html>
			<head></head>
			<body>
				<xsl:apply-templates select="./website/header"/>
				<xsl:apply-templates select="./website/article"/>
				<xsl:apply-templates select="./website/social_share"/>
				<xsl:apply-templates select="./website/admin_controls"/>
				<xsl:apply-templates select="./website/footer"/>
				<style>
					#foot_div {
						position: relative;
						bottom: 20px;
					}
				</style>
			</body>
		</html>
	</xsl:template>

	<xsl:template match="header">
		<div id="head_div">
			<a href="index.php">
				<div id="kth_logo"></div>
			</a>
			<a href="xml_validate.php"><p id="head_menu2"><xsl:value-of select="links/linkXML"/></p></a>
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

			<xsl:apply-templates select="links/logged_out"/>
			<xsl:apply-templates select="links/logged_in"/>


			<a href="set_lang.php"><p id="head_menu4"><xsl:value-of select="links/linkSetLang"/></p></a>
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
				background-image: url("<xsl:value-of select="logo"/>");
				left: 15px;
				top: 15px;
				background-size: 50px 50px;
			}
		</style>
	</xsl:template>

	<xsl:template match="logged_out">
		<a href="login_page.php"><p class="head_menu"><xsl:value-of select="linkLogin"/></p></a>
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
	</xsl:template>

	<xsl:template match="logged_in">
		<a href="control_panel.php"><p class="head_menu"><xsl:value-of select="linkControl"/></p></a>
		<a href="">
			<div id="profile_pic"></div>
		</a>
		<a href="log_out.php"><p id="head_menu3"><xsl:value-of select="linkLogOut"/></p></a>
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
				background-image: url("<xsl:value-of select="profilePic"/>");
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
	</xsl:template>

	<xsl:template match="footer">
		<div id="foot_div">
			<div id="text_wrapper">
				<p class='foot_p'><xsl:value-of select="intro"/></p>
				<ul>
					<li class='foot_p'><xsl:value-of select="list/bullet1"/></li>
					<li class='foot_p'><xsl:value-of select="list/bullet2"/></li>
					<li class='foot_p'><xsl:value-of select="list/bullet3"/></li>
					<li class='foot_p'><xsl:value-of select="list/bullet4"/></li>
					<li class='foot_p'><xsl:value-of select="list/bullet5"/></li>
					<li class='foot_p'><xsl:value-of select="list/bullet6"/></li>
					<li class='foot_p'><xsl:value-of select="list/bullet7"/></li>
				</ul>
				<p class='foot_p'><xsl:value-of select="outro"/></p>
			</div>

			<div id="images_block">
				<div class="person_block">
					<a>
						<xsl:attribute name="href">
							<xsl:value-of select="creators/creator1/linkedin"/>
						</xsl:attribute>
						<div id="foot_chris"></div>
					</a>
					<p class="person_text">
						<xsl:value-of select="creators/creator1/name"/>
						
						<a>
							<xsl:attribute name="href">
								mailto:<xsl:value-of select="creators/creator1/mail"/>
							</xsl:attribute>
							<xsl:value-of select="creators/creator1/mail"/>
						</a>
					</p>
				</div>
				
				<div class="person_block">
					<a>
						<xsl:attribute name="href">
							<xsl:value-of select="creators/creator2/linkedin"/>
						</xsl:attribute>
						<div id="foot_adde"></div>
					</a>
					<p class="person_text">
						<xsl:value-of select="creators/creator2/name"/>
						
						<a>
							<xsl:attribute name="href">
								mailto:<xsl:value-of select="creators/creator2/mail"/>
							</xsl:attribute>
							<xsl:value-of select="creators/creator2/mail"/>
						</a>
					</p>
				</div>
			</div>

			<div id="tobecentered"><p id="map-descr"><xsl:value-of select="contact"/></p></div>

			<div id="map"></div>
			<style>
				#map {
					border: 3px solid gray;
					height: 300px;
					width: 300px;
					border-radius: 100%;
					overflow:hidden;
					margin: auto;
					margin-top: 100px;
					position: relative;
					bottom: 50px;
					-moz-border-radius: 999px;
					-webkit-border-radius: 999px;
					-o-border-radius: 999px;
				}
				#map-descr {
					font-family: Helvetica;
					color: #FFFFFF;
					line-height: 29px;
					margin: 0px;
					font-size: 42px;
				}
				#tobecentered {
					width: 23%;
					margin: auto;
					margin-top: 50px;
				}
			</style>
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
			
			#foot_chris {background-image: url(<xsl:value-of select="creators/creator1/picPath"/>);}
			#foot_adde {background-image: url(<xsl:value-of select="creators/creator2/picPath"/>);}
		</style>
	</xsl:template>

	<xsl:template match="article">

		<div id="article_banner"></div>

		<div id="article_body_wrapper">
			<p id="article_title">
				<xsl:value-of select="title"/>
			</p>
			<p id="article_intro">
				<xsl:value-of select="intro"/>
			</p>
			<p id="article_body">
				<xsl:value-of select="body"/>
			</p>
		</div>
		<style>
			#article_banner {
				width: 100%;
				height: 400px;
				background-image: url("<xsl:value-of select="image_path"/>");
				background-size: 100% 400px;
			}
			#article_title, #article_body, #article_intro {
				font-family: Times;
			}
			#article_title {
				font-size: 30px;
				text-align: center;
			}
			#article_body {
				font-size: 14px;
				margin-bottom: 50px;
			}
			#article_intro {
				font-size: 20px;
				text-align: center;
			}
			#article_body_wrapper {
				margin: auto;
				width: 60%;
			}
		</style>
	</xsl:template>

	<xsl:template match="social_share">

		<xsl:value-of select="title"/>


			<div id="center_this">
				<a>
					<xsl:attribute name="href">
						<xsl:value-of select="twitter/share_url"/>
					</xsl:attribute>
					<xsl:attribute name="id">share_social_twitter</xsl:attribute>
				</a>
				<a>
					<xsl:attribute name="href">
						<xsl:value-of select="facebook/share_url"/>
					</xsl:attribute>
					<xsl:attribute name="id">share_social_facebook</xsl:attribute>
				</a>
				<a>
					<xsl:attribute name="href">
						<xsl:value-of select="google/share_url"/>
					</xsl:attribute>
					<xsl:attribute name="id">share_social_google</xsl:attribute>
				</a>
			</div>


		<style>
			#center_this {
				margin: auto;
				width: 12%;
				margin-top: 50px;
				margin-bottom: 50px;

			}
			#share_social_twitter {
				background-image: url("public/icons/social/twitter.png");
			}
			#share_social_facebook {
				background-image: url("public/icons/social/facebook.png");
			}
			#share_social_google {
				background-image: url("public/icons/social/google.png");
			}
			#share_social_twitter, #share_social_facebook, #share_social_google {
				width: 35px;
				height: 35px;
				background-size: 35px;
				display: inline-block;
				margin: 5px;
			}
		</style>
	</xsl:template>

	<xsl:template match="admin_controls">
		<div id="buttons">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="edit/link"/>
				</xsl:attribute>
				<div id="button1">
					<p><xsl:value-of select="edit/label"/></p>
				</div>
			</a>
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="delete/link"/>
				</xsl:attribute>
				<div id="button2">
					<p><xsl:value-of select="delete/label"/></p>
				</div>
			</a>
		</div>
		<style>
			#buttons {
				width: 30%;
				margin: auto;
				position: relative;
				left: 50px;
			}
			#buttons > a > div > p {
				text-align: center;
				color: #FFFFFF;
				font-size: 17px;
				font-family: Helvetica;
			}
			#button1 {
				background-color: rgba(65, 165, 155, 0.7);
			}
			#button2 {
				background-color: rgba(177, 0, 0, 0.7);
			}
			#button1, #button2 {
				border-radius: 60px;
				padding: 5px;
				padding-left: 20px;
				padding-right: 20px;
				width: 80px;
				display: inline-block;
				margin: 10px;
				margin-bottom: 50px;
			}
		</style>
	</xsl:template>

</xsl:stylesheet>