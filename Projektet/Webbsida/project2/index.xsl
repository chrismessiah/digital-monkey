<?xml version="1.0"?>
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
				<xsl:apply-templates select="./website/articles"/>
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

	<xsl:template match="articles">
		<xsl:apply-templates select="article"/>
	</xsl:template>

	<xsl:template match="article">
		<a>
		<xsl:attribute name="href">
			articles.php?article=<xsl:value-of select="id"/>
		</xsl:attribute>
		<div>
			<xsl:attribute name="id">
				<xsl:value-of select="css_blog_id"/>
			</xsl:attribute>
			<div>
				<p>
					<xsl:attribute name="id">
						<xsl:value-of select="css_blog_title"/>
					</xsl:attribute>
					<xsl:value-of select="title"/>
				</p>
				<p>
					<xsl:attribute name="id">
						<xsl:value-of select="css_blog_intro"/>
					</xsl:attribute>
					<xsl:value-of select="intro"/>
				</p>
			</div>
		</div>
		</a>
		<style>
			#<xsl:value-of select="css_blog_id"/> {
				height: 400px;
				background-image: url(<xsl:value-of select="image_path"/>);
				background-size: 100% 400px;
				background-repeat: no-repeat;
			}
			#<xsl:value-of select="css_blog_id"/> > div {
				background-color: rgba(<xsl:value-of select="overlay_color"/>);
				height: 200px;
				position: relative;
				top: 200px;
			}
			#<xsl:value-of select="css_blog_id"/> > div > p {
				position: relative;
				left: 40px;
				top: 30px;
				font-family: Helvetica;
				color: #FFFFFF;
				padding-bottom: 20px;
			}
			#<xsl:value-of select="css_blog_title"/> {
				font-size: 40px;
			}
			#<xsl:value-of select="css_blog_intro"/> {
				font-size: 22px;
			}
			a {
				text-decoration: none;
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