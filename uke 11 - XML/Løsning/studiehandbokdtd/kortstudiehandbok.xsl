<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/studiehandbok">
  <html>
    <body>
      <h1>
        Studiehandbok 
        <xsl:value-of select="aar"/>
      </h1>
      <p>
        <b>
          <font color="#ff0000#">Dette er ikke en offisiell versjon av studiehandboka!</font>
        </b>
      </p>
      <xsl:apply-templates select="studium"/>
      <ul>
        <xsl:apply-templates select="emne"/>
      </ul>
      <xsl:apply-templates select="oppdatert"/>
    </body>
  </html>

</xsl:template>
  <xsl:template match="oppdatert">
  <hr/>
  <p>
    <em>
      Sist oppdatert 
      <xsl:value-of select="."/>
      .
    </em>
  </p>

</xsl:template>
  <xsl:template match="studium">
  <h2>
    <xsl:value-of select="studiumnavn"/>
    <xsl:text> </xsl:text>
    (
    <xsl:value-of select="studiumkode"/>
    )
  </h2>

</xsl:template>
  <xsl:template match="emne">
    <li>
      <xsl:value-of select="kode"/>
      <xsl:text> </xsl:text>
      <xsl:value-of select="navn"/>
      (
      <xsl:value-of select="omfang"/>
      )
    </li>
</xsl:template>

</xsl:stylesheet>
