<?php 

include_once "hjelpefunksjoner.php";

$connect = kobleOppDB();

toppHTML();

h1("Oppgave 1 - Søkeside");
?>

<form action="" method="GET" accept-charset="utf-8">
	<table border ="0">
		<tr>
			<th>Postnummer:</th>
			<td><input type="text" name="postnr" placeholder="Angi Postnummer"></td>
		</tr>
	</table>
	<p>
		<button type="submit">Send Forespørsel</button>
	</p>
</form>

<?php

if(isset($_GET['postnr'])) {

	$postnr = $_GET['postnr'];

	if($postnr == 3670) {
		$sql = "SELECT ptype, navn, postnr
				FROM produkt 
				WHERE postnr = ? ";
		$stmt = mysqli_prepare($connect, $sql);
		mysqli_stmt_bind_param($stmt, "i", $postnr);
		mysqli_stmt_execute($stmt);
		$resultat = mysqli_stmt_get_result($stmt);
		$rad = mysqli_fetch_assoc($resultat);

		while($rad) {

			$ptype = $rad['ptype'];
			$navn = $rad['navn'];
			$postnr = $rad['postnr'];

			echo "<p>$ptype - $navn - $postnr</p>";

			$rad = mysqli_fetch_assoc($resultat);
		}
	} else {
		echo "<p>Postnummeret til dette museet eksisterer ikke</p>";
	}

	


}
bunnHTML();
lukkDB($connect);

?>