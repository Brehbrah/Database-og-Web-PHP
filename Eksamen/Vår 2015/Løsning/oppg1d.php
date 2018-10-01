<?php 

include_once "hjelpefunksjoner.php";



$connect = kobleOpp();
toppHTML();

echo "<h1>Oppgave 1d - Generere Rom</h1>";

echo '<form action="" method="POST" accept-charset="utf-8">';
	echo "<table border='0'>";
		echo "<tr>";
			echo"<th>Ant.Rom: </th>";
			echo "<td><input type='text' name='rom' placeholder='Angi ant. Rom'></td>";
		echo "</tr>";
	echo "</table>";	
	echo "<p>";
		echo "<button type='submit'>Send Forespørsel</button>";
		echo "<button type='reset'>Rensk Skjema</button>";
	echo "</p>";
echo '</form>';

$rom = $_POST['rom'];

generereRom($connect, $rom, $rom);



bunnHTML();
lukk($connect);

function generereRom($connect, $antRom, $getRom) {

	$romkode = $_GET["$getRom"];

	if(isset($getRom)) {

		$bokstaver = chr(rand(65, 95));

		echo "<table border ='2'>";
					echo "<tr>";
						echo "<th>Romkode</th>";
						echo "<th>Ant Plasser</th>";
					echo "</tr>";
		
		for($i = 0; $i < $antRom; $i++) {

			$romkode = $bokstaver . " - " . $i;

			$sql = "INSERT INTO rom (romkode, ant_plasser) 
					VALUES (? , ?) ";
			$stmt = mysqli_prepare($connect, $sql);
			mysqli_stmt_bind_param($stmt, "si", $romkode, $antRom);
			mysqli_stmt_execute($stmt);

				$sql = "SELECT *
						FROM rom
						WHERE romkode = ? ";
				$stmt = mysqli_prepare($connect, $sql);
				mysqli_stmt_bind_param($stmt, "s", $romkode);
				mysqli_stmt_execute($stmt);
				$resultat = mysqli_stmt_get_result($stmt);
				$rad = mysqli_fetch_assoc($resultat);

				

				while($rad) {

					$romkode = $rad['romkode'];
					$antPlasser = $rad['ant_plasser'];

					echo "<tr>";
						echo "<td>$romkode</td>";
						echo "<td>$antPlasser</td>";
					echo "</tr>";

					$rad = mysqli_fetch_assoc($resultat);
				}

				echo "</table>";

		}

	} else {
		echo "Angi antrall rom nummer";
	}

	

}

?>