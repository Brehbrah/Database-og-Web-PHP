<?php

include_once "database.php";
include_once "hjelpefunksjon.php";

$connect = kobleOpp();
toppHTML();

h1("Oppgave 1c - Sjekke Bilulykke");


	
if (isset($_GET['modell'])) {

	$årsmodell = $_GET['modell'];

	$sql = "SELECT piu.unr AS 'unr', piu.regnr AS 'Bil reg.Nr', k.merke AS 'merke', count(*) AS 'Antall',
			(k.aarsmodell) AS 'Årsmodell'
			FROM person_i_ulykke AS piu, ulykke AS u, kjoretoy AS k
			WHERE piu.unr = u.unr
			AND piu.regnr = k.regnr
            AND YEAR(DATO) = ?
            GROUP BY k.merke";

	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "i", $årsmodell);
	mysqli_stmt_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);
	$rad = mysqli_fetch_assoc($resultat);

	echo "<table border='1'>";
		echo "<tr>";
			echo "<th>UNr</th>";
			echo "<th>Bil Merke<th>";
			echo "<th>Bil RegNr</th>";
			echo "<th>Årsmodell</th>";
			echo "<th>Antall Ulykker</th>";
		echo "</tr>";
	while($rad) {

		$unr = $rad['unr'];
		$merke = $rad['merke'];
		$regnr = $rad['Bil reg.Nr'];
		$modell = $rad['Årsmodell'];
		$ulykke = $rad['Antall'];

		echo "<tr>";
			echo "<td>$unr</td>";
			echo "<td>$merke</td>";
			echo "<td>$regnr</td>";
			echo "<td>$modell</td>";
			echo "<td>$ulykke</td>";
		echo "</tr>";

		$rad = mysqli_fetch_assoc($resultat);
		
	}
	echo "</table>";
} else {
	echo "<p>Angi årsmodell</p>";
}


	


bunnHTML();
lukk($connect); 
?>