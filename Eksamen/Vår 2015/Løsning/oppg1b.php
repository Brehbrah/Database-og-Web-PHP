<?php 

include_once "hjelpefunksjoner.php";

$connect = kobleOpp();
toppHTML();

echo "<h1>Oppgave 1b - Behandle Registrering</h1>";

$romkode = $_POST['romkode'];
$dato = $_POST['dato'];
$klFra = $_POST['kl_fra'];
$klTil = $_POST['kl_til'];
$epost = $_POST['epost'];
$tittel = $_POST['tittel'];

if(!sjekkAtFinnes($connect, "rom", "romkode", $romkode)) {
	echo "<p>Romkoden $romkode eksisterer ikke!</p>";
} else if (!sjekkAtFinnes($connect, "person", "epost", $epost)) {
	echo "<p>Foredragsholder $epost eksisterer ikke!</p>";
} else {
	$sql = "INSERT INTO presentasjon(romkode, dato, kl_fra, kl_til, epost, tittel) 
			VALUES (?, ?, ?, ?, ?, ?)";
	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "ssssss", $romkode, $dato, $klFra, $klTil, $epost, $tittel);
	if(mysqli_stmt_execute($stmt)) {

		$pid = mysqli_insert_id($connect);
		$sql = "SELECT *
				FROM presentasjon  
				WHERE pid = ? ";
		$stmt = mysqli_prepare($connect, $sql);
		mysqli_stmt_bind_param($stmt, "i", $pid);
		mysqli_stmt_execute($stmt);
		$resultat = mysqli_stmt_get_result($stmt);
		$rad = mysqli_fetch_assoc($resultat);

		echo '<table border="2" style="text-align: center;">';
			echo "<tr>";
				echo "<th>PId</th>";
				echo "<th>Romkode</th>";
				echo "<th>Dato</th>";
				echo "<th>Kl Fra</th>";
				echo "<th>Kl Til</th>";
				echo "<th>Epost</th>";
				echo "<th>Tittel</th>";
			echo "</tr>";
		while($rad) {

			$pid = $rad['pid'];
			$romkode = $rad['romkode'];
			$dato = $rad['dato'];
			$klFra = $rad['kl_fra'];
			$klTil = $rad['kl_til'];
			$epost = $rad['epost'];
			$tittel = $rad['tittel'];

			echo "<tr>";
				echo "<td>$pid</td>";
				echo "<td>$romkode</td>";
				echo "<td>$dato</td>";
				echo "<td>$klFra</td>";
				echo "<td>$klTil</td>";
				echo "<td>$epost</td>";
				echo "<td>$tittel</td>";
			echo "</tr>";
			$rad = mysqli_fetch_assoc($resultat);
		}

		echo "</table>";

	} else {
		$errorMld = mysqli_error($connect);
		echo "<p>Noe gikk Galt $errorMld</p>";
	}

}

bunnHTML();
lukk($connect);

?>