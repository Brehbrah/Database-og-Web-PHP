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
		<h3>Din Ordre</h3>
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
		$priser = array (
		33045 => 17.50,
		33044 => 14.50,
		64551 => 118.00,
		55130 => 298.50,
		21032 => 57.50,
		10830 => 57.50,
		13001 => 38.00,
		15217 => 32.00,
		15211 => 209.00,
		15207 => 24.50,
		65247 => 75.00,
		44939 => 115.00,
		42615 => 106.00,
		90693 => 57.00,
		90164 => 75.50
		);
		
		$vare = $_REQUEST['vare'];
		$antall = $_REQUEST['antall'];
		if (!array_key_exists($vare, $navn)) {
			echo "<p>Vare bestillingen eksisterer ikke</p>";
		} else if ($antall < 1) {
			echo "<p>Bestillingen kan ikke være <strong>null</strong>!</p>";
		} else {
			$pris = $priser[$vare];
			$sum = $pris * $antall;
			echo "<h4>Din bestilling:</h4>";
			echo "<ul>";
			foreach ($navn as $vareNr => $betegnelse) {

					echo "<li><b>VareNr:</b> $vareNr</li>";
					echo "<li><b>Betegnelse</b> $betegnelse</li>";
					echo "<li><b>Varepris:</b> $pris</li>";
					echo "<li><b>Antall Enheter:</b> $antall</li>";
					echo "<li><b>Total Sum:</b> $sum kr</li>";
				 break;
				}
				echo "</ul>";
			}
			?>
			
			<script src="js/main.js"></script>
		</body>
	</html>