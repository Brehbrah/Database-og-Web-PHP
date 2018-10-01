<?php

function topp() {
  echo "<!DOCTYPE html>
    <html>
    <head>
    <title>Hobbyhuset</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"standard.css\" />
    <meta charset=\"UTF-8\" />
    <body>";
}

function bunn() {
  echo "<hr/>
    <p>
    <a href=\"mailto:hobbyhuset@xyz.no\">Kontakt oss</a>
    </p>
    </body>
    </html>";
}

function h1($overskrift) {
  echo "<h1> $overskrift </h1>";
}

function hyperlenke($tekst, $url) {
  echo "<a href=\"$url\">$tekst<a>";
}

function skriv_tabell($tab) {
  print("<table border=\"1\">\n");

  print("<tr>\n");
  foreach ($tab[0] as $kol => $verdi) {
    print("<td>$kol</td>\n");
  }
  print("</tr>\n");

  foreach ($tab as $rad) {
    print("<tr>\n");
    print("<td>" . $rad["Varekode"] . "</td>");
    print("<td>" . $rad["Betegnelse"] . "</td>");
    print("<td>kr " . number_format($rad["PrisPrEnhet"], 2) . "</td>");
    print("</tr>");
  }

  print("</table>");
}

function visVarer ($connect, $vareNavn) {

  // henter resultat fra PHPMyAdmin sin tabell aka. array egentlig
  $resultat = søkeStreng($connect, $vareNavn);

  $linje = mysqli_fetch_assoc($resultat);

  echo "<table border ='5' style ='text-align: center;'>";
    echo "<tr>";
      echo "<th>Varekode</th>";
      echo "<th>Betegnelse</th>";
      echo "<th>PrisPrEnhet</th>";
      echo "<th>Antall</th>";
    echo "</tr>";

    while($linje) {
      $varekode = $linje["Varekode"];
      $Betegnelse = $linje["Betegnelse"];
      $pris = $linje["PrisPrEnhet"];
      $antall = $linje["LagerAntall"];

      echo "<tr>";
        echo "<td>". $varekode . "</td>";
        echo "<td>" . $Betegnelse . "</td>";
        echo "<td>" . $pris . "</td>";
        echo "<td>" . $antall . "</td>";
      echo "</tr>";

      $linje = mysqli_fetch_assoc($resultat);
    }
  echo "</table>";
}

?>