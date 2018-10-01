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
            <font color="#ff0000#">
              Dette er ikke en offisiell versjon av studiehandboka!
            </font>
          </b>
        </p>
        <xsl:apply-templates select="studium"/>
        <h2>Emner</h2>
        <xsl:apply-templates select="emne"/>
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
    <h3>Innhold</h3>
    <xsl:value-of select="faginnhold"/>
    <h3>Opptakskrav</h3>
    <xsl:value-of select="opptak"/>
    <xsl:apply-templates select="oppbygging"/>
  </xsl:template>
  
  <xsl:template match="oppbygging">
    <h3>Oppbygging</h3>
    <table border="5">
      <tr>
        <th>Emnekode</th>
        <th>Semester</th>
        <th>Navn</th>
      </tr>
      <xsl:apply-templates select="emnelink"/>
    </table>
  </xsl:template>
  
  <xsl:template match="emnelink">
    <xsl:variable name="emnekode" select="kode"/>
    <tr>
      <td>
        <xsl:value-of select="kode"/>
      </td>
      <td>
        <xsl:value-of select="semester"/>
      </td>
      <td>
        <xsl:value-of select="/studiehandbok/emne[kode=$emnekode]/navn"/>
      </td>
    </tr>
  </xsl:template>
  
  <xsl:template match="emne">
    <h3>
      <xsl:value-of select="kode"/>
      <xsl:text> </xsl:text>
      <xsl:value-of select="navn"/>
    </h3>
    <xsl:apply-templates/>
  </xsl:template>
  
  <xsl:template match="emne/kode"></xsl:template>
  
  <xsl:template match="emne/navn"></xsl:template>
  
  <xsl:template match="omfang">
    <p>
      <b>Omfang</b>
      <br/>
      <xsl:value-of select="."/>
    </p>
  </xsl:template>
  
  <xsl:template match="emne/innhold">
    <p>
      <b>Innhold</b>
      <br/>
      <xsl:value-of select="."/>
    </p>
  </xsl:template>
  
  <xsl:template match="evaluering">
    <p>
      <b>Evaluering</b>
      <br/>
      <xsl:value-of select="."/>
    </p>
  </xsl:template>
  
</xsl:stylesheet>
