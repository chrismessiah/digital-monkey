<xsl:stylesheet version="1.0" xmlns:xsl= "http://www.w3.org/1999/XSL/Transform">

	<xsl:template match="party">
		<xsl:apply-templates/>
	</xsl:template>

	<xsl:template match="title">
		<xsl:apply-templates/>
	</xsl:template>

	<xsl:template match="date">
		<xsl:apply-templates/>
	</xsl:template>

	<xsl:template match="starttime">
		<xsl:apply-templates/>
	</xsl:template>

	<xsl:template match="endtime">
		<xsl:apply-templates/>
	</xsl:template>

</xsl:stylesheet>