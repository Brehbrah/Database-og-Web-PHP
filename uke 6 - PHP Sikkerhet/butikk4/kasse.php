<?php
session_start();

include_once "hjelpefunksjoner.php";
include_once "database.php";

$dblink = kobleOpp();
sjekkInnlogging();

topp();
h1('Kasse');

$kurv = $_SESSION['kurv'];
$bnr = $_SESSION['bnr'];
$brukernavn = $_SESSION['brukernavn'];
$fornavn = $_SESSION['fornavn'];
$etternavn = $_SESSION['etternavn'];

echo '<p>Bruker: ' . $fornavn . " " . $etternavn . '!</p>';

if (count($kurv) == 0)
  echo "<p>Handlekurven er tom!</p>";
else {
  $sql = "INSERT INTO Ordre(Ordredato, BNr) " .
         "VALUES ('" . date('Y-m-d') . "', " . $bnr . ")";
  $ordrenr = settInn($dblink, $sql);
  
  $totalt = 0;
  foreach ($kurv as $varekode => $antall) {
    $sql = "SELECT * FROM Vare WHERE Varekode='$varekode'";
    $rad = hentForsteRad($dblink, $sql);
    $pris = $rad['PrisPrEnhet'];
    echo "<p>Varekode $varekode - $antall stk. a kr. $pris</p>";
    $sql = "INSERT INTO Ordrelinje(Ordrenr, Varekode, PrisPrEnhet, Antall) " .
           "VALUES (" . $ordrenr . ",'" . $varekode . "'," .
           $pris . "," . $antall . ")";
    $totalt = $totalt + $pris*$antall;
    settInn($dblink, $sql);
  }
  echo "<p>Ordre $ordrenr er registrert.</p>";
  echo "<p>Totalt: kr $totalt</p>";
}

echo '<p><a href="loggut.php">Logg ut!</a></p>';

lukk($dblink);
bunn();
?>
