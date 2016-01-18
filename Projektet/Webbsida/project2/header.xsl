<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">

<!-- Space: &#160; -->

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

</xsl:stylesheet>