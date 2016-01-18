<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">

<!-- Space: &#160; -->
	<xsl:import href="header.xsl"/>
	<xsl:import href="footer.xsl"/>

	<xsl:template match="/">
		<html>
			<head>
				<link href="modules/sweetAlert/dist/sweetalert.css" rel="stylesheet" type="text/css" />
			</head>
			<body>
				<xsl:apply-imports/>
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
				<xsl:apply-templates select="./website/error"/>
			</body>
		</html>
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
				white-space: pre-wrap
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

	<xsl:template match="error">
		<script src="modules/sweetAlert/dist/sweetalert.min.js"/>
		<script type="text/javascript">
			swal({
				title: "<xsl:value-of select="title"/>",
				text: "<xsl:value-of select="message"/>",
				type: "<xsl:value-of select="type"/>",
				confirmButtonText: "<xsl:value-of select="button_text"/>",
				timer: 1500,
				showConfirmButton: false
			});
		</script>
	</xsl:template>

</xsl:stylesheet>