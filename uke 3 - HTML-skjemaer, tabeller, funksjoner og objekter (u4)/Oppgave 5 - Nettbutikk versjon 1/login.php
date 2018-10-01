<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Untitled</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="author" href="humans.txt">
	</head>
	<body>

		<h3>Varebestilling</h3>

		<?php
		
		$brukere = array (
		'Ola' => 'Hemmelig',
		'Mari' => 'Iram'
		);

		$brukernavn = $_REQUEST['brukernavn'];
		$passord = $_REQUEST['passord'];

		// Alternativ 1)

		if(!array_key_exists($brukernavn, $brukere)) {
			echo "<hp>$brukernavn finnes ikke</p>";
		} else if ($brukere[$brukernavn] == $passord) {

			echo "<p>Velkommen <strong>$brukernavn</strong>!</p>";

			echo '<form action="bestilling.php" method="POST" accept-charset="utf-8">';
			echo "<table border = '0'>";
				echo '<tr>';
					echo "<td>Varenummer:</td>";
					echo "<td><input type='text' size='10' name ='vare'></input></td>";
				echo '</tr>';

				echo '<tr>';
					echo '<td>Antall Enheter:</td>';
					echo "<td><input type = 'text' size ='10' name='antall'</td>";
				echo '</tr>';
			echo "</table>";
			echo 
			"<p>
				<button type='submit'>Submit</button>
				<button type='reset'>Reset</button>
			</p>";
			echo "</form>";
		} else {
			echo "<p>Ugyldig Passord</p>";	
		}

	 /* Alternativ 2)
		foreach ($brukere as $bruker => $pass) {
			if ($brukernavn == $bruker && $passord == $pass) {
				echo "<h3>Velkommen $bruker</h3>";
			} else {
				echo "<h3>Ugyldig brukernavn eller Passord</h3>";
			}
			break;
		}*/


		?>
		
		<script src="js/main.js"></script>
	</body>
</html>