<xsl:stylesheet version="1.0"
   xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>

	<xsl:template match="/">
  		<p><xsl:value-of select="count(.//ELECTORAL[VALID/@PARTY = 'M' and VALID/@PERCENTAGE > 18])"/></p>
	</xsl:template>

</xsl:stylesheet>