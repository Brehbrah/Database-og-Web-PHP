<?php
include_once("hjelpefunksjoner.php");
include_once("database.php");

topp();
$dblink = kobleOpp();

print("<h1>Ajourhold varelager</h1>");
print("<p><a href=\"adm_rediger_vare.php\">Registrere ny vare</a></p>");

$resultat = hentVarer($dblink, "");

$linje = mysqli_fetch_array($resultat, MYSQL_ASSOC);
print("<table border='1'>\n");

print("<tr>\n");
print("<th>Varekode</th>\n");
print("<th>Betegnelse</th>\n");
print("<th>Pris</th>\n");
print("<th>Antall</th>\n");
print("</tr>\n");

while ($linje) {
  $varekode = $linje["Varekode"];
  $betegnelse = $linje["Betegnelse"];
  $pris = $linje["PrisPrEnhet"];
  $antall = $linje["LagerAntall"];

  // Merk bruk av URL-parameter her!
  print("<tr>\n");
  print("<td><a href='adm_rediger_vare.php?varekode=" . $varekode ."'>" .
         $varekode . "</a></td>\n");
  print("<td>" . $betegnelse . "</td>\n");
  print("<td>" . number_format($pris,2) . " kr</td>\n");
  print("<td>" . $antall . "</td>\n");
  print("</tr>\n");

  $linje = mysqli_fetch_array($resultat, MYSQL_ASSOC);
}
print("</table>\n");

lukk($dblink);
bunn();
?>
