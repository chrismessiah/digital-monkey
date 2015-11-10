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
	    		<xsl:apply-templates/>
	    	</body>
		</html>
	</xsl:template>

<!-- 	
	<xsl:template match="page/title">
	 	<title>
	 		<xsl:value-of select="."/>
	 	</title>
	</xsl:template>


 -->







</xsl:stylesheet>