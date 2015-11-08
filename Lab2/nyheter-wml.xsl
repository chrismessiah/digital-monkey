<?xml version="1.0"?>
<xsl:stylesheet version="1.0" 
   xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> 

<xsl:output method="xml"
    doctype-public="-//WAPFORUM//DTD WML 1.1//EN"
    media-type="text/vnd.wap.wml"    doctype-system="http://www.wapforum.org/DTD/wml_1.1.xml"
    indent="yes"/>
  <xsl:template match="page">
    <wml>
      <card title="{title}">
        <p>
          <xsl:apply-templates/>
        </p>
      </card>
    </wml>
  </xsl:template>

  <xsl:template match="author">
    <big>
      <xsl:text>
        wap wap wap
      </xsl:text>
    </big>
  </xsl:template>

  <xsl:template match="title"/>
  <xsl:template match="version"/>
  <xsl:template match="newscolumn"/>
  <xsl:template match="statuscolumn"/>
  <xsl:template match="legal"/>

</xsl:stylesheet>


