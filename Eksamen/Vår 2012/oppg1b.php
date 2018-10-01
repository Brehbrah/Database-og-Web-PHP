<?php

include_once "hjelpefunksjon.php";
include_once "database.php";

$connect = kobleOpp();

toppHTML();

h1("Oppgave 1b ");

$fornavn = $_POST['fornavn'];
$etternavn = $_POST['etternavn'];
$fødselsdato = $_POST['dato'];
$kjønn = $_POST['kjønn'];

if(empty($fornavn) || empty($etternavn) || empty($fødselsdato) || empty($kjønn)) {
	echo "<h2>Må fylle ut alle feltene!</h2>";
} if ($kjønn == !is_string("M") || $kjønn == !is_string("K")) {
	echo "<h2>Ugyldig! Må være 'M' eller 'K'!</h2>";
} else {
	$sql = "INSERT INTO person (fornavn, etternavn, fodselsdato, kjonn) 
			VALUES(?, ?, ?, ?) "; 

	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "ssss", $fornavn, $etternavn, $fødselsdato, $kjønn);
	if(mysqli_stmt_execute($stmt)) {

		$id = mysqli_insert_id($connect);
		$sql = "SELECT *
				FROM person 
				WHERE id = '$id' ";

		$resultat = mysqli_query($connect, $sql);
		$rad = mysqli_fetch_assoc($resultat);

		echo "<table border='1' style='text-align: center;'>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Fornavn</th>";
				echo "<th>Etternavn</th>";
				echo "<th>Fødselsdato</th>";
				echo "<th>Kjønn</th>";
			echo "</tr>";
		while($rad) {	
			$id = $rad['id'];
			$fornavn = $rad['fornavn'];
			$etternavn = $rad['etternavn'];
			$dato = $rad['fodselsdato'];
			$kjønn = $rad['kjonn'];

			echo "<tr>";
				echo "<td>$id</td>";
				echo "<td>$fornavn</td>";
				echo "<td>$etternavn</td>";
				echo "<td>$dato</td>";
				echo "<td>$kjønn</td>";
			echo "</tr>";
			$rad = mysqli_fetch_assoc($resultat);
		}
	}
}

bunnHTML();
lukk($connect);

?>