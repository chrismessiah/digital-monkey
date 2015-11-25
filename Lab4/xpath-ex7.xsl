<xsl:stylesheet version="1.0"
   xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>

<!-- 	<xsl:template match="/">
		<xsl:apply-templates select=".//PERSONELECTION[contains(@NAME,'R')]"/>
	</xsl:template>

	<xsl:template match="PERSONELECTION">
  		<p><xsl:value-of select="@NAME"/></p>
	</xsl:template>
 -->

	<xsl:template match="/">
		<p><xsl:apply-templates select="//PERSONELECTION/@NAME[contains(.,'R') and not(preceding::PERSONELECTION/@NAME=.)]"/></p>
	</xsl:template>
</xsl:stylesheet>