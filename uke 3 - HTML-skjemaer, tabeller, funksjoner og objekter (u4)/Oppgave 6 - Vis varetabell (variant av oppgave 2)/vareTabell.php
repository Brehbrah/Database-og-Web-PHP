<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Untitled</title>
		<link rel="author" href="humans.txt">
	</head>
	<body>
		<h1>Oppgave 6 - Vis varetabell (variant av oppgave 2)</h1>
		
		<?php

		$varetab = array (
		array("Varekode" => 33045, "Betegnelse" => "Blomkarse", "PrisPrEnhet" => 17.50),
		array("Varekode" => 33044, "Betegnelse" => "Blandet blomsterfrø", "PrisPrEnhet" => 14.50),
		array("Varekode" => 64551, "Betegnelse" => "Hengebegonia, 10 stk.", "PrisPrEnhet" => 118.00),
		array("Varekode" => 55130, "Betegnelse" => "Moro med marsipan", "PrisPrEnhet" => 298.50),
		array("Varekode" => 21032, "Betegnelse" => "Furuspon, 3 cm", "PrisPrEnhet" => 57.50),
		array("Varekode" => 10830, "Betegnelse" => "Nisseskjegg, 30 cm", "PrisPrEnhet" => 57.50),
		array("Varekode" => 13001, "Betegnelse" => "Glasskuler, 100 gr", "PrisPrEnhet" => 38.00),
		array("Varekode" => 15217, "Betegnelse" => "Kram tørrfluekorker, 5stk", "PrisPrEnhet" => 32.00),
		array("Varekode" => 15211, "Betegnelse" => "Tubeflue verktøy", "PrisPrEnhet" => 209.00),
		array("Varekode" => 15207, "Betegnelse" => "Antron garn, hvit", "PrisPrEnhet" => 24.50),
		array("Varekode" => 65247, "Betegnelse" => "Liten plantespade", "PrisPrEnhet" => 75.00),
		array("Varekode" => 44939, "Betegnelse" => "Hobbymaling, 6 farger", "PrisPrEnhet" => 115.00),
		array("Varekode" => 42615, "Betegnelse" => "Gipsform marihøner", "PrisPrEnhet" => 106.00),
		array("Varekode" => 90693, "Betegnelse" => "Marsipantang", "PrisPrEnhet" => 57.00),
		array("Varekode" => 90164, "Betegnelse" => "Lakrisekstrakt, 100g", "PrisPrEnhet" => 75.50)
		);

		echo '<table border = "5">';
		echo '<tr>
				<th>VareNr</th>
				<th>Betegnelse</th>
				<th>PrisPrEnhet</th>
			 </tr>';
			 
		foreach ($varetab as $tabell) {
			echo "<tr>";
			echo "<td>" . $tabell["Varekode"] . "</td>";
			echo "<td>" . $tabell["Betegnelse"] . "</td>";
			echo "<td>" . $tabell["PrisPrEnhet"] . "</td>";
			echo "<tr>";
		}
		
		echo '</table>';
		?>
		<script src="js/main.js"></script>
	</body>
</html>