<?php
include_once "hjelpefunksjoner.php";
include_once "database.php";

// Foreløpig ingen lagring til database!
// Viser kun hva som er bestillt.

topp();
$dblink = kobleOpp();

$vnr = $_REQUEST['txtVnr'];
$antall = $_REQUEST['txtAntall'];

h1('Kasse');
$rad = hentVare($dblink, $vnr);

if ($rad == null) {
  echo "<p>Varenr $vnr finnes ikke!</p>";
}
else {
  if ($antall < 1) {
    echo "<p>Antall må være positiv!</p>";
  }
  else {
    $betegnelse = $rad["Betegnelse"];
    $pris = $rad["PrisPrEnhet"];
    $total = $pris*$antall;
    echo "<p>Varen er i bestilling.</p>";
    echo "<ul>";
    echo "<li>Varenr: $vnr</li>";
    echo "<li>Betegnelse: $betegnelse </li>";
    echo "<li>Varepris: " . number_format($pris,2,',',' ') . "</li>";
    echo "<li>Antall enheter: $antall</li>";
    echo "<li>Totalpris: " . number_format($total,2,',',' ') . "</li>";
    echo "</ul>";
  }
}

lukk($dblink);
bunn();
?>
