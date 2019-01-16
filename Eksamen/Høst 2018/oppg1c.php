<?php 

include_once "hjelpefunksjoner.php";

function totalPris($rnr, $mnd) {

	$connect = kobleOppDB();

	$sql = "SELECT r.rnr, p.mnd, SUM(? * p.pris) AS 'Total Pris'
			FROM reise AS r, produktireise as pr, pris AS p
			WHERE r.rnr = pr.rnr
			AND r.rnr = ? ";

	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "ii", $mnd, $rnr);
	mysqli_stmt_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);
	$rad = mysqli_fetch_assoc($resultat);

	while($rad) {

		$rnr = $rad['rnr'];
		$mnd = $rad['mnd'];
		$pris = $rad['Total Pris'];

		echo "<ul>";
			echo "<li>Reise Nr: $rnr</li>";
			echo "<li>Måned Nummer: $mnd</li>";
			echo "<li>Total Beløp: $pris</li>";
		echo "</ul>";

		$rad = mysqli_fetch_assoc($resultat);
	}

	lukkDB($connect);
}


$connect = kobleOppDB();
toppHTML();

h1("Oppgave 1c - Total Pris");

?>

<form action="" method="GET" accept-charset="utf-8">
	<table border ="0" style="text-align: left;">
		<tr>
			<th>RNr: </th>
			<td><input type="text" name="rnr"></td>
		</tr>

		<tr>
			<th>Måned: </th>
			<td><input type="text" name="mnd"></td>
		</tr>
	</table>
	<p>
		<button type="submit">Send Forespørsel</button>
		<button type="reset">Rensk Skjema</button>
	</p>
</form>

<?php

if(isset($_GET['rnr']) && isset($_GET['mnd'])) {

	$rnr = $_GET['rnr'];
	$mnd = $_GET['mnd'];

	totalPris($rnr, $mnd);

}



bunnHTML();
lukkDB($connect);


?>