<?php 

include_once "database.php";
include_once "hjelpefunksjon.php";

$connect = kobleOpp();
toppHTML();

echo "<h1>Oppgave 1c</h1>";

if (isset($_GET['epost'])) {

	$epost = $_GET['epost'];
	$fornavn = $_GET['fornavn'];
	$etternavn = $_GET['etternavn'];
	
	$sql = "SELECT L.LNr, U.Beskrivelse, K.Navn, 
      CONCAT(B.Fornavn, ' ', B.Etternavn) AS Leier,
      DATEDIFF(L.TilDato, L.FraDato) AS AntDager,
      L.Poengsum
    FROM Bruker AS B, Kategori AS K,
      Leieforhold AS L, UtleieObjekt AS U
    WHERE L.LeierEpost = B.Epost
    AND L.ObjNr = U.ObjNr
    AND U.KatNr = K.KatNr
    AND U.EierEpost = '$epost'";

		$resultat = mysqli_query($connect, $sql);
		$rad = mysqli_num_rows($resultat);

		echo "<ul>";
			
		while ($rad) {
			$beskrivelse = $rad['Beskrivelse'];
			$navn = $rad['Navn'];
			$leier = $rad['Leier'];
			$dag = $rad['AntDager'];
			//$beskrivelse = $rad['Beskrivelse'];

			echo "<li>$beskrivelse, $navn, $leier, $dag</li>";
			$rad = mysqli_fetch_assoc($resultat);

		}

		echo "</ul>";
} else {
	echo "<h1>Ingen epost Angitt!</h1>";
}



lukk($connect);
bunnHTML();

?>