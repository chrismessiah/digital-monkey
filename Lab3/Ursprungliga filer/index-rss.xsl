<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                xmlns:rss="http://purl.org/rss/1.0/"
                xmlns:dc="http://purl.org/dc/elements/1.1/"
                xmlns:syn="http://purl.org/rss/1.0/modules/syndication/"
                xmlns="http://www.w3.org/1999/xhtml"
                version="1.0">
<xsl:output indent="yes"/> 

<xsl:template match="rdf:RDF">
   <html>
     <head>
       <title>Lab 3 feed</title>
     </head>
     <body>
       <xsl:apply-templates />
     </body>
   </html>
</xsl:template>

</xsl:stylesheet>

