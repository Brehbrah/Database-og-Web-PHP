<?php 

include_once "database.php";
include_once "hjelpefunksjon.php";


session_start();
session_destroy();


$connect = kobleOpp();
toppHTML(); 


h1("Oppgave 1b - Skjema Validert");

$epost = $_SESSION['EierEpost'] = $_REQUEST["brukernavn"];
$beskrivelse = $_POST["beskrivelse"];
$katnr = $_POST["katnr"];
$dagspris = $_POST["pris"];

if (isset($epost)) {

	$sql = "SELECT *
			FROM utleieobjekt
			WHERE ObjNr = ? ";

	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "i", $katnr);
	mysqli_stmt_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);

	if (mysqli_num_rows($resultat) == 1) {

		$sql = "INSERT INTO utleieobjekt (Beskrivelse, EierEpost, KatNr, DagPris)" . 
				"VALUES (?, ? ,? , ?) ";

		$stmt = mysqli_prepare($connect, $sql);
		mysqli_stmt_bind_param($stmt, "ssid", $beskrivelse, $epost, $katnr, $dagspris);
		mysqli_stmt_execute($stmt);
		$resultat = mysqli_stmt_get_result($stmt);

		if ($resultat) {
			$objNr = mysqli_insert_id($connect);

			echo "<h2>Din vare er registert</h2>";
			echo "<p>Din kvittering $epost!</p>";
			echo "<ul>";
				echo "<li>Din objektNr: $objNr</li>";
				echo "<li>Beskrivelse: $beskrivelse</li>";
				echo "<li>kat.Nr: $KatNr</li>";
				echo "<li>Dagspris: $dagspris</li>";
			echo "</ul>";
		} else {
			echo "<h2>Eposten $epost eksisterer ikke!</h2>";
		}
	}

} else {
	echo "Feil Innlogging</h2>";
}



lukk($connect);
bunnHTML();

?>