<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">

	<xsl:template match="/">
		<html>
			<head>
				<title><xsl:value-of select="./page/title"/></title>

				<meta>
					<xsl:attribute name="name">
						<xsl:value-of select="name(./page/author)"/>
					</xsl:attribute>
					<xsl:attribute name="content">
						<xsl:value-of select="./page/author"/>
					</xsl:attribute>
				</meta>

				<meta>
					<xsl:attribute name="name">
						<xsl:value-of select="name(./page/version)"/>
					</xsl:attribute>
					<xsl:attribute name="content">
						<xsl:value-of select="./page/version"/>
					</xsl:attribute>
				</meta>

			</head>
			<body>
				<h1>Nyheter</h1>
				<xsl:apply-templates select="./page/newscolumn"/>
				<h1>Projektstatus</h1>
				<xsl:apply-templates select="./page/statuscolumn"/>
			</body>
		</html>
	</xsl:template>


	<xsl:template match="newscolumn|statuscolumn">
		<ul>
			<xsl:apply-templates select="news|project"/>
		</ul>
	</xsl:template>

	<xsl:template match="news">
		<li>

		<a>
			<xsl:attribute name="href">
				<xsl:value-of select="link"/>
			</xsl:attribute>
			<strong><xsl:value-of select="title"/></strong>
		</a>
		 - <strong><xsl:value-of select="date/day"/>
				<xsl:text>&#xA0;</xsl:text>
				<xsl:value-of select="date/month"/>
				<xsl:text>&#xA0;</xsl:text>
				<xsl:value-of select="date/year"/>.
			</strong>
			<xsl:value-of select="content"/>
		</li>
	</xsl:template>



	<xsl:template match="project">
		<li>

		<a>
			<xsl:attribute name="href">
				<xsl:value-of select="link"/>
			</xsl:attribute>
			<strong><xsl:value-of select="title"/></strong>
		</a>
		<ul>
			<xsl:apply-templates select="release"/>
		</ul>
		</li>
	</xsl:template>

	<xsl:template match="release">
		<li><strong><xsl:value-of select="version"/> - 
				<xsl:value-of select="status"/>
				<xsl:text>&#xA0;</xsl:text></strong>
				<xsl:value-of select="comment"/>
			<xsl:value-of select="content"/>
		</li>
	</xsl:template>



</xsl:stylesheet>