<?php
include_once("hjelpefunksjoner.php");
include_once("database.php");

// Hent skjemadata
$varekode=$_REQUEST["varekode"]; 
$betegnelse=$_REQUEST["betegnelse"]; 
$pris=$_REQUEST["pris"]; 
$antall=$_REQUEST["antall"]; 
$operasjon = $_REQUEST["operasjon"];

// Bygg SQL-kode
if ($operasjon == 1) {
  $operTekst = "oppdatert";
  $sql = "UPDATE Vare " .
         "SET Betegnelse = '$betegnelse', " .
         " PrisPrEnhet = $pris, " .
         " LagerAntall = $antall " .
         " WHERE Varekode = '$varekode';";
}
else if ($operasjon == 2) {
  $operTekst = "satt inn";
  $sql = "INSERT INTO Vare(Varekode, Betegnelse, PrisPrEnhet, LagerAntall) " .
         "VALUES('$varekode', '$betegnelse', $pris, $antall);";
}
else if ($operasjon == 3) {
  $operTekst = "slettet";
  $sql = "DELETE FROM Vare " .
         "WHERE Varekode = '$varekode';";
}
else {
  $operTekst = "UKJENT";
  $sql = "";
}

// Utfør spørring mot databasen
$dblink = kobleOpp();

// For testing:
// print("<p>SQL: $sql</p>");

$resultat = mysqli_query($dblink, $sql);

if ($resultat)
  $antallRader = mysqli_affected_rows($dblink);
else
  $antallRader = 0;

lukk($dblink);


// Vis kvittering
topp();

print("<h1>Kvittering</h1>\n");

print("<p>Varekode: $varekode</p>");
print("<p>Betegnelse: $betegnelse</p>");
print("<p>Pris: $pris</p>");
print("<p>Antall: $antall</p>");

print("<p></p>\n");
print("<p><b>$antallRader rad(er) er $operTekst !</b></p>");

bunn();
?>
