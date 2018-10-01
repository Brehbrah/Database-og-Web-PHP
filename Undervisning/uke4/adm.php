<?php

include_once 'hjelpefunksjoner.php';
topp();

$hn = "localhost";
$db = "butikk";
$un = "root";
$pw = "";

$conn = new mysqli($hn, $un, $pw, $db);
MYSQLI_SET_CHARSET($conn, "utf8");

if ($conn->connect_error) {
    h1("Feil");
    die($conn->connect_error);
} else {
    h1("Redigering av varer");

	$sql = "SELECT*FROM Vare";
	$svar = $conn->query($sql);
	$rad = mysqli_fetch_assoc($svar);
	while ($rad) {
		$varekode = $rad['Varekode'];
		$betegnelse = $rad['Betegnelse'];
		$pris = $rad['PrisPrEnhet'];
		echo "<p><a href=\"rediger.php?kode=$varekode&pris=$pris\">$varekode</a></p>";
		echo "<p>$betegnelse : kr <b>$pris</b></p><br>";
		
		$rad = mysqli_fetch_assoc($svar); // neste rad
		
    }
}

mysqli_close($conn);

bunn();

?>