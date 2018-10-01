<?php 

include_once "hjelpefunksjoner.php";

	$connect = kobleOpp();
	toppHTML();

	echo "<h1>Oppgave 1b - Tabell av Spiller</h1>";
	$spillerNr = 1;

	$sql = "SELECT s.SpillerNr,r.RundeNr, r.HullNr ,CONCAT(s.Fornavn, ' ', s.Etternavn) AS 'Navn', 	
			ROUND(SUM(r.AntallSlag - h.AntallSlagPar)/COUNT(*)) AS 'Poeng'
			FROM bane AS b, hull AS h, resultat AS r, runde AS ru, spiller AS s
			WHERE s.SpillerNr = ?
			AND r.RundeNr = ru.RundeNr
			AND r.HullNr = r.HullNr 
			GROUP BY s.spillerNr";

	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "i", $spillerNr);
	mysqli_stmt_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);
	$rad = mysqli_fetch_assoc($resultat);

	echo "<table border ='2' style='text-align: center;'>";
		echo "<tr>";
			echo "<th>SpillerNr</th>";
			echo "<th>rundeNr</th>";
			echo "<th>HullNr</th>";
			echo "<th>Navn</th>";
			echo "<th>Poeng</th>";
		echo "</tr>";
	while($rad) {

		$spillerNr = $rad['SpillerNr'];
		$rundeNr = $rad['RundeNr'];
		$hullNr = $rad['HullNr'];
		$navn = $rad['Navn'];
		$poeng = $rad['Poeng'];

		echo "<tr>";
			echo "<td>$spillerNr</td>";
			echo "<td>$rundeNr</td>";
			echo "<td>$hullNr</td>";
			echo "<td>$navn</td>";
			echo "<td>$poeng</td>";
		echo "</tr>";

		$rad = mysqli_fetch_assoc($resultat);
	} 
	echo "</table>";


	bunnHTML();
	lukk($connect);
?>