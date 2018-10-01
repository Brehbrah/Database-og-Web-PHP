<?php 

include_once "database.php";
include_once "hjelpefunksjon.php";

$connect = kobleOpp();
toppHTML();



h1("Oppgave 1c - viser  alle leieforhold  for en bestemt  utleier");

if (isset($_GET['epost'])) {

	$epost = $_GET['epost'];

	$sql = "SELECT L.LNr, U.KatNr, U.Beskrivelse, K.Navn, CONCAT (B.Fornavn, ' ', B.Etternavn) AS Navn, 
				   L.FraDato, L.TilDato, DATEDIFF(L.TilDato, L.FraDato) AS AntDager, L.Poengsum, U.DagPris
    		FROM Bruker AS B, Kategori AS K, Leieforhold AS L, UtleieObjekt AS U
		    WHERE L.LeierEpost = B.Epost
		    AND L.ObjNr = U.ObjNr
		    AND U.KatNr = K.KatNr
		    AND U.EierEpost = '$epost' ";
	$resultat = mysqli_query($connect, $sql);
	$rad = mysqli_fetch_assoc($resultat);

	echo "<table border = '2' style='text-align: center;'>";
		echo "<tr>";
			echo "<th>Navn</th>";
			echo "<th>LeieNr</th>";
			echo "<th>KatNr</th>";
			echo "<th>Beskrivelse</th>";
			echo "<th>Fra Dato</th>";
			echo "<th>Til Dato</th>";
			echo "<th>Antall Dager</th>";
			echo "<th>Dagspris</th>";
		echo "</tr>";

		while($rad) {
			$leieNr = $rad['LNr'];
			$navn = $rad['Navn'];
			$katnr = $rad['KatNr'];
			$beskrivelse = $rad['Beskrivelse'];
			$dagspris = $rad['DagPris'];
			$fraDato = $rad['FraDato'];
			$tilDato = $rad['TilDato']; 
			$antdager = $rad['AntDager'];

			echo "<tr>";
				echo "<td>$navn</td>";
				echo "<td>$leieNr</td>";
				echo "<td>$katnr</td>";
				echo "<td>$beskrivelse</td>";
				echo "<td>$fraDato</td>";
				echo "<td>$tilDato</td>";
				echo "<td>$antdager</td>";
				echo "<td>$dagspris</td>";
			echo "</tr>";

			$rad = mysqli_fetch_assoc($resultat);
		}
	echo "</table>";

} else {
	echo "<h2>Eksisterer ingen epost</h2>";
}

bunnHTML();
lukk($connect);

?>