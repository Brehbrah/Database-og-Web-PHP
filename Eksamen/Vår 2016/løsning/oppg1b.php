<?php 

include_once "hjelpefunksjoner.php";

$connect = kobleOpp(); 

session_start();
session_destroy();

toppHTML();

h1("Oppgave 1b - Behandle Skjema");

$epost = $_SESSION['Epost'] = $_REQUEST['epost'];
$beskrivelse = $_POST['beskrivelse'];
$katNr = $_POST['katnr'];
$pris = $_POST['dagspris'];

if(isset($epost)) {
	echo "<p>Eposten $epost eksisterer ikke!</p>";
} else if (!sjekkAtFinnes($connect, "kategori", "KatNr", $katNr)) {
	echo "<p>Kategori nummer $katNr eksisterer ikke</p>";
} else {
	
	$sql = "INSERT INTO utleieobjekt(Beskrivelse, EierEpost, KatNr, DagPris) 
		    VALUES (?, ?, ?, ?) ";
	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "ssid", $beskrivelse, $epost, $katNr, $pris);
	if(mysqli_stmt_execute($stmt)) {
		$objNr = mysqli_insert_id($connect);

		$sql = "SELECT *
				FROM utleieobjekt
				WHERE ObjNr = ? ";
		$stmt = mysqli_prepare($connect, $sql);
		mysqli_stmt_bind_param($stmt, "i", $objNr);
		mysqli_stmt_execute($stmt);
		$resultat = mysqli_stmt_get_result($stmt);
		$rad = mysqli_fetch_assoc($resultat);

		echo "<table border = '2' style='text-align: center;'>";

			echo "<tr>";
				echo "<th>ObjNr</th>";
				echo "<th>Beskrivelse</th>";
				echo "<th>EierEpost</th>";
				echo "<th>KatNr</th>";
				echo "<th>DagPris</th>";
			echo "</tr>";
		while($rad) {

			$objNr = $rad['ObjNr'];
			$beskrivelse = $rad['Beskrivelse'];
			$epost = $rad['EierEpost'];
			$katNr = $rad['KatNr'];
			$pris = $rad['DagPris'];

			echo '<tr>';
				echo "<td>$objNr</td>";
				echo "<td>$beskrivelse</td>";
				echo "<td>$epost</td>";
				echo "<td>$katNr</td>";
				echo "<td>$pris</td>";
			echo "</tr>";

			$rad = mysqli_fetch_assoc($resultat);
		}	

		echo "</table>";
	} else {
		$errorMld = mysqli_error($connect);
		echo "<p>Noe gikk Galt: $errorMld</p>";
	}

}

bunnHTML();
lukk($connect); 


?>