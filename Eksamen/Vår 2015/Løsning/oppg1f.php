<?php

include_once "hjelpefunksjoner.php";

$connect = kobleOpp();

	if($_GET['sok']) {

		$sok = $_GET['sok'];

		$sql = "SELECT *
				FROM presentasjon 
				WHERE tittel LIKE '%$sok%' ";
		$resultat = mysqli_query($connect, $sql);
		$rad = mysqli_fetch_assoc($resultat);

		echo "<ul>";

		while ($rad) {
			$tittel = $rad['tittel'];

			echo "<li>$tittel</li>";
			$rad = mysqli_fetch_assoc($resultat);
		}
		echo "</ul>";
	} else {
		echo "<p style='color: red;'>Ingen presentasjoner eksisterer</p>";
	}

lukk($connect);

?>