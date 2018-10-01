<?php
include_once "database.php";

// Viser standard topp (header) på alle nettsider
function topp() {
  echo "<!DOCTYPE html>
    <html>
    <head>
    <title>Hobbyhuset</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"standard.css\" />
    <meta charset=\"UTF-8\" />
    <body>";
}

// Viser standard bunn (footer) på alle nettsider
function bunn() {
  echo "<hr/>
    <p>
    <a href=\"mailto:hobbyhuset@xyz.no\">Kontakt oss</a>
    </p>
    </body>
    </html>";
}

// Viser en tekst som overskrift av type 1
function h1($overskrift) {
  echo "<h1>$overskrift</h1>";
}

// Viser bestselgere som en HTML punktliste
function visBestselgere($dblink, $n) {
  $resultat = hentBestselgere($dblink, $n);
  $linje = mysqli_fetch_array($resultat, MYSQL_ASSOC);
  echo "<ol>\n";
  while ($linje) {
    $betegnelse = $linje["Betegnelse"];
    echo "<li>$betegnelse</li>\n";
    $linje = mysqli_fetch_array($resultat, MYSQL_ASSOC);
  }
  echo "</ol>\n";
}

// Viser varer som inneholder en søketekst i navnet
// som en HTML-tabell
function visVarer($dblink, $varenavn) { 
  $resultat = hentVarer($dblink, $varenavn);

  $linje = mysqli_fetch_array($resultat, MYSQL_ASSOC);
  echo "<table border='5'>\n";

  echo "<tr>\n";
  echo "<th>Varekode</th>\n";
  echo "<th>Betegnelse</th>\n";
  echo "<th>Pris</th>\n";
  echo "<th>Antall</th>\n";
  echo "</tr>\n";

  while ($linje) {
    $varekode = $linje["Varekode"];
    $betegnelse = $linje["Betegnelse"];
    $pris = $linje["PrisPrEnhet"];
    $antall = $linje["LagerAntall"];

    echo "<tr>\n";
    echo "<td>" . $varekode . "</td>\n";
    echo "<td>" . $betegnelse . "</td>\n";
    echo "<td>" . number_format($pris,2) . " kr</td>\n";
    echo "<td>" . $antall . "</td>\n";
    echo "</tr>\n";

    $linje = mysqli_fetch_array($resultat, MYSQL_ASSOC);
  }
  echo "</table>\n";
}

?>