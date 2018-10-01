<?php 

include_once "hjelpefunksjon.php";

$connect = kobleOpp();
toppHTML();

echo "<h1>Oppgave 1c -  «mulige nye venner» </h1>";

if(isset($_REQUEST['submit'])) {

	$bnr1 = $_GET['bnr1'];

	if (!isset($bnr1)) {
		echo "<h2>Ugyldig! Angi BNr1</h2>";	
	} else {

		$sql = "SELECT v.bnr1, v.bnr2, b.epost, v.bekreftet
				FROM venn AS v, bruker as b
				WHERE v.bnr2 = b.bnr
				AND v.bnr1 = '$bnr1'
				AND v.bekreftet = 'J'";

		$resultat = mysqli_query($connect, $sql);

		$rad = mysqli_fetch_assoc($resultat);

		echo "<table border ='1' style='text-align: center;'>";
			echo "<tr>";	
				echo "<th>BNr1</th>";
				echo "<th>BNr2</th>";
				echo "<th>Epost</th>";
				echo "<th>Venner</th>";
			echo "</tr>";
		while($rad) {
			$bnr1 = $rad['bnr1'];
			$bnr2 = $rad['bnr2'];
			$epost = $rad['epost'];
			$bekreftet = $rad['bekreftet'];

			echo "<tr>";
				echo "<td>$bnr1</td>";
				echo "<td>$bnr2</td>";
				echo "<td>$epost</td>";
				echo "<td>$bekreftet</td>";
			echo "</tr>";

			$rad = mysqli_fetch_assoc($resultat);
		}
		echo "</table>";
	}

}

?>

<form action="" method="GET" accept-charset="utf-8">
	<table border="0">
		<tr>
			<th>BNr1: </th>
			<td><input type="text" name="bnr1" placeholder="Angi BNr1"></td>
		</tr>
	</table>
	<p>
		<button type="submit" name="submit">Submit</button>
		<button type="reset" name="reset">Reset</button>
	</p>
</form>

<?php
bunnHTML();
lukk($connect);

?>