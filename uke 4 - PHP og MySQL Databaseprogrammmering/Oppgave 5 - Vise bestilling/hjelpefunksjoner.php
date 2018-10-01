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

?>