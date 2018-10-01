<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">
	</head>
	<body>
		<h1>Oppgave 3: Vis vareliste</h1>
		<h3>Vareliste</h3>
		<?php

		$navneliste = array
		(
		'Blomkarse',
		'Blandet blomsterfrø',
		'Hengebegonia, 10 stk.',
		'Moro med marsipan',
		'Furuspon, 3 cm',
		'Nisseskjegg, 30 cm',
		'Glasskuler, 100 gr',
		'Kram tørrfluekorker, 5stk',
		'Tubeflue verktøy',
		'Antron garn, hvit',
		'Liten plantespade',
		'Hobbymaling, 6 farger',
		'Gipsform marihøner',
		'Marsipantang',
		'Lakrisekstrakt, 100g'
		);

		echo '<ul>';
		foreach ($navneliste as $vareliste) {
			echo "<li>$vareliste</li>";
		}
		echo '</ul>';


		?>
		
	</body>
</html>