<?php

include_once "database.php";
include_once "hjelpefunksjon.php";

session_start();
session_destroy();

$connect = kobleOpp();
toppHTML();

echo "<h1>Oppgave 1b</h1>";


$epost = $_SESSION['EierEpost'] = $_REQUEST["brukernavn"];
$beskrivelse = $_POST["beskrivelse"];
$katnr = $_POST["katnr"];
$dagspris = $_POST["dagspris"];

if (isset($epost)) {

	$sql = "SELECT * FROM kategori WHERE KatNr = ? ";
	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "i", $katnr);
	mysqli_stmt_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);

	if (mysqli_num_rows($resultat) == 1) {

		$sql = "INSERT INTO utleieobjekt (Beskrivelse, EierEpost, KatNr, DagPris)" . 
		    "VALUES (?, ?, ?, ?) ";
		$stmt = mysqli_prepare ($connect, $sql);
		mysqli_stmt_bind_param($stmt, "ssid", $beskrivelse, $epost, $katnr, $dagspris);
		if (mysqli_stmt_execute($stmt)) {
			$objnr = mysqli_insert_id($connect);

			
			echo "<p>Hei $epost! <br> Din utleieobjekt <b>$objnr</b> ble lagret.</p>";
		} else {
			echo "<h1>$epost Eksisterer ikke!</h1>";
		}
	}
} else {
	echo "<h1>Feil Innlogging!</h1>";
}

lukk($connect);
bunnHTML();

?>