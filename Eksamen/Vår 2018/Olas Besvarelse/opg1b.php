<?php 


$dblink = mysqli_connect("localhost", "root", "", "test");

if (!$dblink) {
	die("Ikke kblet til basen");
}
mysqli_set_charset($dblink, 'utf8');

$baneNr = 1; // Siden det er bare 1 bane som er spilt på. Vi kunne kjørt en for-løkke for alle baner

$sql = "SELECT b.BaneNr, CONCAT(s.Fornavn, ' ', s.Etternavn) as navnet,s.SpillerNr, ROUND(SUM(re.AntallSlag - h.AntallSlagPar)/COUNT(*)) as tot FROM hull as h, bane as b, runde as ru, resultat as re, spiller as s WHERE s.SpillerNr = re.SpillerNr AND ru.RundeNr = re.RundeNr AND b.BaneNr = ru.BaneNr AND h.BaneNr = b.BaneNr AND h.HullNr = re.HullNr AND b.BaneNr = $baneNr";
$resultat = mysqli_query($dblink, $sql);
$svar = mysqli_fetch_assoc($resultat);

$spillerNr = $svar["SpillerNr"];
$tot = $svar["tot"];
$navn = $svar["navnet"];
$baneNr = $svar["BaneNr"];

 ?>

<table>
	<tr><th>Spiller Nummer: </th><th>Navn</th><th>BaneNr</th><th>Handicap</th></tr>
	<?php 
		echo "<tr><td>$spillerNr</td><td>$navn</td><td>$baneNr</td><td>$tot</td></tr>";
	 ?>
	</table>