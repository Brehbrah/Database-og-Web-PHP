<?php 

	include_once "hjelpefunksjoner.php";

	$connect = kobleOpp();
	toppHTML();

	?>

	<h1>Oppgave 1c - Sjekke Presentasjons Rom</h1>

	<form action="" method="GET" accept-charset="utf-8">
		<table border ="0">
			<tr>
				<th>Dato: </th>
				<td><input type="text" name="dato" placeholder="Angi YYYY-MM-DD"></td>
			</tr>
		</table>	
		<p>
			<button type="submit">Send Forespørsel</button>
			<button type="reset">Rensk Skjema</button>
		</p>
	</form>


	
	<?php

	if (isset($_GET['dato'])) {

		$dato = $_GET['dato'];

		$sql = "SELECT * 
				FROM presentasjon 
				WHERE dato = ? 
				ORDER BY romkode, kl_fra ASC ";

		
		$stmt = mysqli_prepare($connect, $sql);
		mysqli_stmt_bind_param($stmt, "s", $dato);
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
		echo "<p>Angi Dato til presentasjon dag</p>";
	} 
	bunnHTML();
	lukk($connect);

?>