<?php 

include_once "hjelpefunksjoner.php";

$connect = kobleOpp();

toppHTML();

h1("Oppgave 1c - Viser Leieforhold");

echo '<form action="" method="GET" accept-charset="utf-8">
		<table border ="0">
			<tr>
				<th>LeierEpost: </th>
				<td><input type="text" name="epost" value=""></td>
			</tr>
		</table>
		<p>
			<button type="submit">Send Forespørsel</button>
			<button type="reset">Rensk Skjema</button>
		</p>
	</form>';

$epost = $_GET['epost'];

$sql = "SELECT k.Navn AS 'Kategori Navn',  u.Beskrivelse, 
		CONCAT(b.Fornavn, ' ', b.Etternavn) AS 'Navn', DATEDIFF(l.TilDato, l.FraDato) AS 'Antall Utleiedager', l.Poengsum
		FROM Bruker AS b, kategori AS k, leieforhold AS l, utleieobjekt as u
		WHERE u.ObjNr = l.ObjNr
		AND u.KatNr = k.KatNr
		AND b.Epost = l.LeierEpost
		AND u.EierEpost = ? ";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "s", $epost);
mysqli_stmt_execute($stmt);
$resultat = mysqli_stmt_get_result($stmt);
$rad = mysqli_fetch_assoc($resultat);

while($rad) {

	$katNavn = $rad['Kategori Navn'];
	$beskrivelse = $rad['Beskrivelse'];
	$navn = $rad['Navn'];
	$leieDag = $rad['Antall Utleiedager'];
	$poeng = $rad['Poengsum'];

	echo "<ul>";
		echo "<li>Kategori Navn: $katNavn</li>";
		echo "<li>Beskrivelse: $beskrivelse</li>";
		echo "<li>Leie Navn: $navn</li>";
		echo "<li>Antall Utleiedager: $leieDag</li>";
		echo "<li>PoengSum: <b>$poeng</b></li>";
	echo "</ul>";

$rad = mysqli_fetch_assoc($resultat);
}


bunnHTML();

lukk($connect);
?>