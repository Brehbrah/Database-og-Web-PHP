<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">
	</head>
	<body>
		<h1>Oppgave 2: Vis varetabell</h1>
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
		echo '<table border ="2%"';
			echo '<tr>';
				echo '<td>VareNr:</td>';
				echo '<td>Betegnelse:</td>';
			echo '</tr>';
			foreach ($navn as $vareNr => $betegnelse) {
			echo '<tr>';
				echo "<td>$vareNr</td>";
				echo "<td>$betegnelse</td>";
			echo '</tr>';
			}				
		echo '</table>';
		?>
		
	</body>
</html>