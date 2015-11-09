<?xml version="1.0"?>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns="http://www.w3.org/1999/xhtml">

<xsl:template match="/">
 <html>
  <head>
    <xsl:apply-templates/>
  </head>
  <body>
    <xsl:apply-templates/>
  </body>
 </html>
</xsl:template>

<xsl:template match="title">
  <xsl:apply-templates/>
</xsl:template>


</xsl:stylesheet>

