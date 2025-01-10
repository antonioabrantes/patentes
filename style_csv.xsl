<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" encoding="UTF-8" indent="yes" />
  
  <!-- Template principal -->
  <xsl:template match="/">
    <html>
      <head>
        <title>Authority File</title>
        <style>
          body { font-family: Arial, sans-serif; margin: 20px; }
          table { border-collapse: collapse; width: 100%; }
          th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
          th { background-color: #f4f4f4; }
        </style>
      </head>
      <body>
	  <pre>
          <xsl:for-each select="authority-file/authority-file-entry">
              <xsl:value-of select="publication-reference/document-id/doc-number" /><xsl:text>,</xsl:text>
              <xsl:value-of select="publication-reference/document-id/kind" /><xsl:text>,</xsl:text>
              <xsl:value-of select="publication-reference/document-id/country" /><xsl:text>,</xsl:text>
              <xsl:value-of select="publication-reference/document-id/date" />
			  <xsl:text>&#10;</xsl:text> <!-- Adiciona uma quebra de linha -->
          </xsl:for-each>
	  </pre>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>

