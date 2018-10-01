<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">
	</head>
	<body>
		<h1>Oppgave 1</h1>
		<?php
		$maks = 10;
		echo "<ul>";
					for ($i = 0; $i <= $maks; $i++) {
					echo "<li>$i</li>";
				}
		echo "</ul>";
		?>
		<hr>
		<?php
		// Gange tabell
		echo '<table border = "5">';
				echo '<tr>';
						for ($i=1; $i<=$maks; $i++) {
							for ($j=1; $j<=$maks; $j++) {
							$svar = $i*$j;
							echo "<td><strong>$i*$j</strong>=$svar</td>";
						}
				echo '</tr>';
				}
		echo '</table>';
	echo '</table>';
	?>
	<hr>
	<?php
		echo '<table border ="5">';
				// 1) Første raden for $maks
					echo '<tr>';
							echo '<td></td>'; // Blankt Tegn
						for($i = 1; $i <= $maks; $i++) {
						echo "<th>$i</th>";
					}			
					// 2) Vensre kolonne for $maks
						for ($i = 1; $i <= $maks; $i++) {
							print'<tr>';
								print('<td>'. $i . '</td>');

								// 3) Multiplikasjon innefor tabellen
								for ($j = 1; $j <= $maks; $j++) {
									$svar = $i * $j;
									echo "<td> $svar </td>";
								}
							print('</tr>');
						}						
					echo '</tr>';
			echo '</table>';
		?>
	</body>
</html>