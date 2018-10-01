<?php 

include_once "hjelpefunksjon.php";

$connect = kobleOpp();
toppHTML();

echo "<h1>Oppgave 1a</h1>";
	?>
		<form action="" method="GET" accept-charset="utf-8">
			<table border="0">
				<tr>
					<th>BNr: </th>
					<td><input type="text" name="bnr" placeholder="Angi BNr"></td>
				</tr>
			</table>
			<p>
				<button type="submit" name="submit">Submit</button>
				<button type="reset">Reset</button>
			</p>
		</form>
	<?php

if (isset($_GET['bnr'])) {
	$bnr = $_GET['bnr'];

	$sql = "SELECT m.mnr, m.bnr, b.epost, m.tittel, m.tekst, m.dato
			FROM melding AS m, bruker as b
			WHERE m.bnr = '$bnr'
			AND b.bnr = m.bnr";

	$resultat = mysqli_query($connect, $sql);
	$rad = mysqli_fetch_assoc($resultat);

	if ($rad) {
		$tittel = $rad['tittel'];
		$tekst = $rad['tekst'];
		$dato = $rad['dato'];
		$epost = $rad['epost'];

		echo "<h1>$tittel</h1>";
		echo "<a href='mailto: $epost'>$epost</a>";
		echo "<p>$tekst <b>$dato</b></p>";

		$rad = mysqli_fetch_assoc($resultat);
	}
	
}
bunnHTML();
lukk($connect);

?>