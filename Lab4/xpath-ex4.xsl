<xsl:stylesheet version="1.0"
   xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>

	<xsl:template match="/">
  		

  		<xsl:value-of select="count(.//ELECTORAL[VALID/@PARTY = 'M' and VALID/@PERCENTAGE > 18])"/>


	</xsl:template>



</xsl:stylesheet>