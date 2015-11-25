<xsl:stylesheet version="1.0"
   xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>

	<xsl:template match="/">
  		<p><xsl:value-of select="sum(.//PERSONELECTION[@NAME = 'Fredrik Reinfeldt']/@PERSONALVOTES)"/></p>
	</xsl:template>


</xsl:stylesheet>