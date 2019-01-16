<?php 

include_once "hjelpefunksjoner.php";

function visReiser() {
	$connect = kobleOppDB();
	toppHTML();

	h1("Oppgave 2 - Registrerte Reise");

	$sql = "SELECT r.rnr, p.*, r.rnavn AS 'reisenavn'
			FROM reise AS r, produktireise AS pr, produkt AS p
			WHERE pr.rnr = r.rnr
			AND p.pnr = pr.pnr ";
	$resultat = mysqli_query($connect, $sql);
	$rad = mysqli_fetch_assoc($resultat);

	while($rad) {
	
		$rnr = $rad['rnr'];
		$rnavn = $rad['reisenavn'];

		$pnr = $rad['pnr'];
		$ptype = $rad['ptype'];
		$navn = $rad['navn'];
		$adr = $rad['adr'];
		$postnr = $rad['postnr'];
		$tlf = $rad['tlf'];

		echo "<ul>";
			echo "<li>ReiseNr: $rnr</li>";
			echo "<li>ReiseNavn: $rnavn</li>";
			echo "<li>PNr: $pnr</li>";
			echo "<li>PType $ptype</li>";
			echo "<li>Navn: $navn</li>";
			echo "<li>Adresse: $adr</li>";
			echo "<li>Postnr: $postnr</li>";
			echo "<li>Tlf: $tlf</li>";
		echo "</ul>";

		$rad = mysqli_fetch_assoc($resultat);
	}



	bunnHTML();
	lukkDB($connect);
}

visReiser();

?>