<?php 

include_once "hjelpefunksjon.php";

$connect = kobleOpp();
toppHTML();

echo "<h1>Oppgave 1b</h1>";

?>

<form action="" method="GET" accept-charset="utf-8">
		
		<table border="0" style="text-align: left;">
			<tr>
				<th>BNr1: </th>
				<td><input type="text" name="bnr1" placeholder="Angi bnr1"></td>
			</tr>
			<tr>
				<th>BNr2: </th>
				<td><input type="text" name="bnr2" placeholder="Angi bnr2"></td>
			</tr>
			<tr>
				<th>Bekreftet: </th>
				<td><input type="text" name="bekreft" placeholder="Angi 'J' eller 'N'"></td>
			</tr>
		</table>
		<p>
			<button type="submit" name="submit">Submit</button>
			<button type="reset" name="reset">Rensk Skjema</button>
		</p>
	</form>

<?php

if(isset($_REQUEST['submit'])) {

	$bnr1 = $_REQUEST['bnr1'];
	$bnr2 = $_REQUEST['bnr2'];
	$bekreft = $_REQUEST['bekreft'];
	$dato = date("Y-m-d");

	if($bekreft == !is_string("J") || $bekreft == !is_string("N")) {
		echo "<h2>Ugyldig! Kun 'J' eller 'N'!</h2>";

	} else if(isset($bnr1) && isset($bnr2))

	$sql = "INSERT INTO venn (bnr1, bnr2, fra_dato, bekreftet)
			VALUES(?, ?, ?, ?) ";

	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "iiss", $bnr1, $bnr2, $dato, $bekreft);

	if(mysqli_stmt_execute($stmt)) {

		$sql = "SELECT * 
				FROM venn 
				WHERE bnr1 = '$bnr1' 
				AND bnr2 = '$bnr2' 
				AND fra_dato = '$dato' 
				AND bekreftet = '$bekreft' ";

		$resultat = mysqli_query($connect, $sql);
		$rad = mysqli_fetch_assoc($resultat);

		echo "<table border ='1' style='text-align: center;'>";
			echo "<tr>";	
				echo "<th>BNr1</th>";
				echo "<th>BNr2</th>";
				echo "<th>Fra Dato</th>";
				echo "<th>Bekreftet</th>";
			echo "</tr>";	
		while ($rad) {
			$bnr1 = $rad['bnr1'];
			$bnr2 = $rad['bnr2'];
			$fra_dato = $rad['fra_dato'];
			$bekreftet = $rad['bekreftet'];

			echo "<tr>";
				echo "<td>$bnr1</td>";
				echo "<td>$bnr2</td>";
				echo "<td>$fra_dato</td>";
				echo "<td>$bekreftet</td>";
			echo "</tr>";


			$rad = mysqli_fetch_assoc($resultat);
		}

		echo "</table>";
		 
	} else {
		$feilMld = mysqli_error($connect);
		echo "<h2 style='color:red;'>Noe gikk galt: $feilMld</h2>";
	}
}



bunnHTML();
lukk($connect);
?>