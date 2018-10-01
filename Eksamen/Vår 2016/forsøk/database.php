<?php 

define("TJENER",	"localhost");
define("BRUKERNAVN",	"root");
define("PASSORD",	"");
define("DB",	"eksamen");

function kobleOpp() {
	$connect = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);
	if (!$connect) {
		die("Kan ikke kobles til databasen: " . mysqli_error($connect));
	}
	mysqli_set_charset($connect, 'utf8');
	return $connect;
}		

function lukk($connect) {
	mysqli_close($connect);
}

function viseKategori ($connect) {
	$sql = "SELECT Navn FROM kategori ";
	$resultat = mysqli_query($connect, $sql);
	$rad = mysqli_fetch_assoc($resultat);

	echo "<table border = '2' style='text-align: center;'>";
	while($rad) {
		$navn = $rad['Navn'];
		echo "<tr>";

			echo "<td>$navn</td>";
		echo "</tr>";

		$rad = mysqli_fetch_assoc($resultat);
	}
	echo "</table>";
}

?>