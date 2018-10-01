<?php
include_once "hjelpere.php";
include_once "oppg1b.php";

topp();
$db = kobleOpp();

echo "<h1>Oppgave 1b - test</h1>";

$anr = 1; // $anr = 99;
if (sjekkAtFinnes($db, "Ansatt", "ANr", $anr)) {
  echo "Ansatt $anr finnes.";
}
else {
  echo "Ukjent ansatt $anr.";
}

lukk($db);
bunn();

?>
