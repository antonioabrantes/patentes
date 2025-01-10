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
        <h1>Authority File</h1>
        <h2>Exception Codes</h2>
        <table>
          <tr>
            <th>Code</th>
            <th>Description</th>
          </tr>
          <xsl:for-each select="authority-file/authority-file-definition/exception-code-list/exception-code-definition">
            <tr>
              <td><xsl:value-of select="exception-code" /></td>
              <td><xsl:value-of select="exception-code-description" /></td>
            </tr>
          </xsl:for-each>
        </table>

        <h2>Document Kind Codes</h2>
        <table>
          <tr>
            <th>Kind</th>
            <th>Description</th>
          </tr>
          <xsl:for-each select="authority-file/authority-file-definition/document-kind-code-list/document-kind-code-definition">
            <tr>
              <td><xsl:value-of select="kind" /></td>
              <td><xsl:value-of select="document-kind-code-description" /></td>
            </tr>
          </xsl:for-each>
        </table>

        <h2>Authority File Entries</h2>
        <table>
          <tr>
            <th>Document ID</th>
            <th>Kind</th>
            <th>Country</th>
            <th>Date</th>
          </tr>
          <xsl:for-each select="authority-file/authority-file-entry">
            <tr>
              <td><xsl:value-of select="publication-reference/document-id/doc-number" /></td>
              <td><xsl:value-of select="publication-reference/document-id/kind" /></td>
              <td><xsl:value-of select="publication-reference/document-id/country" /></td>
              <td><xsl:value-of select="publication-reference/document-id/date" /></td>
            </tr>
          </xsl:for-each>
        </table>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
