<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">

	<xsl:template match="/">
		<html>
			<head>
				<title><xsl:value-of select="./page/title"/></title>

				<!-- Fråga om meta taggar -->
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



				<xsl:apply-templates/>



			</body>
		</html>
	</xsl:template>


	<xsl:template match="page/newscolumn/news">
		<ul><li>

		<a>
			<xsl:attribute name="href">
				<xsl:value-of select="link"/>
			</xsl:attribute>
			<strong><xsl:value-of select="title"/></strong>
		</a>
		<p> - 
			<strong>
				<xsl:value-of select="date/year"/>
				<xsl:text>&#xA0;</xsl:text>
				<xsl:value-of select="date/month"/>
				<xsl:text>&#xA0;</xsl:text>
				<xsl:value-of select="date/day"/>.
			</strong>
			<xsl:value-of select="content"/>
		</p>

		</li></ul>
	</xsl:template>










</xsl:stylesheet>