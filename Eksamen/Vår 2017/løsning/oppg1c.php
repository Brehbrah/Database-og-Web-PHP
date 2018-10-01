<?php 

include_once "hjelpefunksjoner.php";
include_once "oppg1b.php";

$connect = kobleOpp();
toppHTML();

$anr = $_POST['anr'];
$beskrivelse = $_POST['beskrivelse'];
$tnr = $_POST['tnr'];
$dato = $_POST['dato'];
$km = $_POST['km'];

echo "<h1>Oppgave 1c - Registrere inn i Databasen</h1>";


if(!sjekkAtFinnes($connect, "ansatt", "ANr", $anr)) {
	echo "Ansattnr $anr eksisterer ikke!";
} else if (!sjekkAtFinnes($connect, "transportmiddel", "TNr", $tnr)) {
	echo "Transportmiddel $tnr eksisterer ikke";
} else {
	$sql = "INSERT INTO reise (Beskrivelse, FraDato, TilDato, ANr, Godkjent)
			VALUES(?, ?, ?, ?, FALSE) ";
	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "sssi", $beskrivelse, $dato, $dato, $anr);
	if(mysqli_stmt_execute($stmt)) {	

		$rnr = mysqli_insert_id($connect);

		$sql = "SELECT *
				FROM reise
				WHERE RNr = ?";
		$stmt = mysqli_prepare($connect, $sql);
		mysqli_stmt_bind_param($stmt, "i", $rnr);
		mysqli_stmt_execute($stmt);
		$resultat = mysqli_stmt_get_result($stmt);

		$rad = mysqli_fetch_assoc($resultat);

		echo '<table border ="2" style="text-align: center;">';

			echo "<tr>";
				echo '<th>RNr</th>';
				echo '<th>Beskrivelse</th>';
				echo '<th>FraDato</th>';
				echo '<th>TilDato</th>';
				echo '<th>ANr</th>';
				echo '<th>Godkjent</th>';
			echo "</tr>";

		while($rad) {

			$rnr = $rad['RNr'];
			$beskrivelse = $rad['Beskrivelse'];
			$fraDato = $rad['FraDato'];
			$tilDato = $rad['TilDato'];
			$anr = $rad['ANr'];
			$godkjent = $rad['Godkjent'];

			echo "<tr>";
				echo "<td>$rnr</td>";
				echo "<td>$beskrivelse</td>";
				echo "<td>$fraDato</td>";
				echo "<td>$tilDato</td>";
				echo "<td>$anr</td>";
				echo "<td>$godkjent</td>";
			echo "</tr>";

			$rad = mysqli_fetch_assoc($resultat);
		}

		echo '</table>';
	} else {
		$error = mysqli_error($connect);
		echo 'Noe gikk Galt: ' . $error;
	}
}


bunnHTML();
lukk($connect);

?>