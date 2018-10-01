<?php
include_once "hjelpefunksjoner.php";
include_once "database.php";

topp();

echo "<h1>Passord blir generert og kryptert...</h1>";

echo "<p>For å gjøre det enkelt å teste blir passordet til alle brukere generert
  fra de to første tegnene i epost-adressen (ikke et skikkelig passord altså).
  Hvis epost-adressen starter på f.eks. ab, så blir passordet abab.</p>";

$dblink = kobleOpp();

$sql = "SELECT * FROM Bruker";
$resultat = mysqli_query($dblink, $sql);

$rad = mysqli_fetch_assoc($resultat);
$sql = "";
while ($rad) {
    $bnr = $rad['BNr'];
	$passord = substr($rad['Epost'], 0, 2) . substr($rad['Epost'], 0, 2);
	
	// Burde også brukt tilfeldig "salt", se PHP-dokumentasjonen
	$kryptert = crypt($salt);
	$sjekk = (crypt($passord, $kryptert) == $kryptert);
	
	// I nyere versjoner av PHP kan man i stedet bruke password_hash for
	// å kryptere og password_verify for å sjekke.
	
	$sql .= "UPDATE Bruker SET Passord = '$kryptert' WHERE BNr = $bnr;";
	echo "<p>BNr=$bnr, Passord=$passord, kryptert=$kryptert, ok=$sjekk</p>";

    $rad = mysqli_fetch_assoc($resultat);
}
mysqli_free_result($resultat);

$svar = mysqli_multi_query($dblink, $sql);	 
while (mysqli_more_results($dblink)) {
  $svar = $svar && mysqli_next_result($dblink);
}

if ($svar)
  echo "<p>Alle passord ble kryptert korrekt.</p>";
else
  echo "<p>En eller flere oppdateringer av passord feilet.</p>";
  
lukk($dblink);
bunn();
?>
