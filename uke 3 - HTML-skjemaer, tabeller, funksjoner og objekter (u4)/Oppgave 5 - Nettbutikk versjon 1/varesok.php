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

		<h3>VareSøk</h3>
		<?php

		$navn = array (
		33045 => "Blomkarse",
		33044 => "Blandet blomsterfrø",
		64551 => "Hengebegonia, 10 stk.",
		55130 => "Moro med marsipan",
		21032 => "Furuspon, 3 cm",
		10830 => "Nisseskjegg, 30 cm",
		13001 => "Glasskuler, 100 gr",
		15217 => "Kram tørrfluekorker, 5stk",
		15211 => "Tubeflue verktøy",
		15207 => "Antron garn, hvit",
		65247 => "Liten plantespade",
		44939 => "Hobbymaling, 6 farger",
		42615 => "Gipsform marihøner",
		90693 => "Marsipantang",
		90164 => "Lakrisekstrakt, 100g"
		);

		echo "<table border='5'";
		echo "<tr>
				<td><b>VareNr</b></td>
				<td><b>Betegnelse</b></td>
			</tr>";
		foreach ($navn as $vareNr => $betegnelse) {		
		echo "<tr>";
			print ("<td>$vareNr</td>");
			print ("<td>$betegnelse</td>");
		}
		echo "</tr>";
		echo "</table>";

		?>


		
		<script src="js/main.js"></script>
	</body>
</html>