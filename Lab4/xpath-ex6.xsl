<xsl:stylesheet version="1.0"
   xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>

	<xsl:template match="/">
  		<xsl:value-of select="sum(.//PERSONELECTION[@NAME = 'Fredrik Reinfeldt']/@PERSONALVOTES)"/>
	</xsl:template>


</xsl:stylesheet>