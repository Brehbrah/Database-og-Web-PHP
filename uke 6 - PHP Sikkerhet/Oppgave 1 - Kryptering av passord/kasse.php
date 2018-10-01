<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
session_start();

include "database.php";
include "hjelpefunksjoner.php";

$connect = kobleOpp();
toppHTML();

if (!isset($_SESSION["brukernavn"])) {
  echo "<h1>Du er ikke innlogget!</h1>";
  echo "<h2><a href='index.php'>Gå tilbake til innlogging</a>.</h2>";
} else {
  
  $kurv = $_SESSION['kurv'];
  $bnr = $_SESSION['bnr'];
  $brukernavn = $_SESSION['brukernavn'];
  $fornavn = $_SESSION['fornavn'];
  $etternavn = $_SESSION['etternavn'];

  $navn = $fornavn . ' ' . $etternavn;

  echo "<h2>Bruker: $navn</h2>";

  $sql = "INSERT INTO Ordre(Ordredato, BNr) " .
         "VALUES ('" . date('Y-m-d') . "', " . $bnr . ")";
  $ordrenr = settInn($connect, $sql);

  foreach ($kurv as $vareKode => $antall) {

    $sql = "SELECT * FROM Vare" . 
           "WHERE Varekode = '$vareKode'";
    $rad = hentForsteRad($connect, $sql);
    $pris = $rad['PrisPrEnhet'];
  }

}



bunnHTML();
kobleNed($connect);


?>