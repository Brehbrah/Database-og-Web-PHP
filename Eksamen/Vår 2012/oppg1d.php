<?php 

include_once "database.php";
include_once "hjelpefunksjon.php";

session_start();

$connect = kobleOpp();
toppHTML();

h1("Oppgave 1e - Registrere ulykke");

?>


<form action="oppg1d.php" method="POST" accept-charset="utf-8">
	
	<table border ="0" style="text-align: left;">
		<tr>
			<th>UNr: </th>
			<td><input type="text" name="unr" placeholder="Angi UNr"></td>
		</tr>
		<tr>
			<th>ID: </th>
			<td><input type="text" name="id" placeholder="Angi ID"></td>
		</tr>
		<tr>
			<th>Rolle: </th>
			<td><input type="text" name="rolle" placeholder="Angi Rolle"></td>
		</tr>
		<tr>
			<th>Reg.Nr: </th>
			<td><input type="text" name="regnr" placeholder="Angi Reg.Nr"></td>
		</tr>
	</table>	

	<p>
		<input type="submit" name="sendKnapp" Value="Submit">
		<button type="reset">Rensk Skjema</button>
	</p>
</form>

<?php

if(isset($_POST['sendKnapp'])) {

	$unr = $_POST['unr'];
	$id = $_POST['id'];
	$rolle = $_POST['rolle'];
	$regnr = $_POST['regnr'];

	$sql = "INSERT INTO  person_i_ulykke (unr, id, rolle, regnr) 
			VALUES(?, ?, ?, ?) ";

	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "iiss", $unr, $id, $rolle, $regnr);
	mysqli_stmt_execute($stmt);

	if(mysqli_stmt_execute($stmt)) {

		$sql = "SELECT u.unr, piu.id, piu.rolle, piu.regnr
				FROM person AS p, ulykke AS u, person_i_ulykke AS piu, kjoretoy AS k 
				WHERE u.unr = '$unr' 
				AND piu.rolle = '$rolle'
				AND p.id = '$id'
				AND k.regnr = '$regnr' ";
		$resultat = mysqli_query($connect, $sql);
		$rad = mysqli_fetch_assoc($resultat);

		echo "<table border='0'>";

			echo "<tr>";
				echo "<th>UNr</th>";
				echo "<th>Rolle</th>";
				echo "<th>ID</th>";
				echo "<th>Reg.Nr</th>";
			echo "</tr>";
		while($rad) {

			$unr = $rad['unr'];
			$id = $rad['id'];
			$rolle = $rad['rolle'];
			$regnr = $rad['regnr'];

			echo "<tr>";
				echo "<th>$unr</th>";
				echo "<th>$rolle</th>";
				echo "<th>$id</th>";
				echo "<th>$regnr</th>";
			echo "</tr>";

			$rad = mysqli_fetch_assoc($resultat);
		}

		echo "</table>";

	} else {
		$feilMld = mysqli_error($connect);
		echo "<p>Noe gikk galt </p>" . $feilMld;
	}
} else {
	echo "<h2>Noe gikk galt!</h2>" or die(mysqli_error($connect));
}


bunnHTML();
lukk($connect);

?>