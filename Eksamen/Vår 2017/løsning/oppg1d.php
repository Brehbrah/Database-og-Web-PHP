<?php
include_once "hjelpefunksjoner.php";
$connect = kobleOpp();
toppHTML();
echo "<h1>Oppgave 1d - Sjekke reiser</h1>";

echo '<form action="" method="GET" accept-charset="utf-8">
	<table border ="0" style="text-align: left">
		<tr>
			<th>LederNr: </th>
			<td><input type="text" name="lederNr"></td>
		</tr>
	</table>
	<p>
		<input type="submit" name="submit" value="Send Forespørsel">
		<input type="reset" name="reset" value="Rensk Forespørsel">
	<p>
</form>';


$leder = $_GET['lederNr'];

$sql = "SELECT r.RNr, a.ANr, a.Fornavn, a.Etternavn, r.Beskrivelse, r.FraDato, r.TilDato,
SUM(t.KmPris * s.AntKm) AS 'Totalt Beløp'
FROM reise AS r, ansatt AS a, strekning AS s, transportmiddel AS t
WHERE r.RNr = s.RNr
AND r.ANr = a.ANr
AND t.TNr = s.TNr
AND leder = ?
GROUP BY r.RNr DESC ";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "i", $leder);
if(mysqli_stmt_execute($stmt)) {
$resultat = mysqli_stmt_get_result($stmt);
$rad = mysqli_fetch_assoc($resultat);
echo '<table border ="2" style = "text-align: center;">';
	echo '<tr>';
		echo "<th>RNr</th>";
		echo "<th>ANr</th>";
		echo "<th>Fornavn</th>";
		echo "<th>Etternavn</th>";
		echo "<th>Beskrivelse</th>";
		echo "<th>FraDato</th>";
		echo "<th>TilDato</th>";
		echo "<th>Totalt Beløp</th>";
	echo '</tr>';
	while($rad) {
	$rnr = $rad['RNr'];
	$anr = $rad['ANr'];
	$fornavn = $rad['Fornavn'];
	$etternavn = $rad['Etternavn'];
	$beskrivelse = $rad['Beskrivelse'];
	$fraDato = $rad['FraDato'];
	$tilDato = $rad['TilDato'];
	$beløp = $rad['Totalt Beløp'];
	echo '<tr>';
		echo "<td>$rnr</td>";
		echo "<td>$anr</td>";
		echo "<td>$fornavn</td>";
		echo "<td>$etternavn</td>";
		echo "<td>$beskrivelse</td>";
		echo "<td>$fraDato</td>";
		echo "<td>$tilDato</td>";
		echo "<td>$beløp</td>";
	echo '</tr>';
	$rad = mysqli_fetch_assoc($resultat);
	}
echo "</table>";
} else {
$error = mysqli_error($connect);
echo "<h2>Noe gikk Galt $error</h2>";
}
bunnHTML();
lukk($connect);
?>