<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">

		<style>
			strong {
				color: red;
			}
		</style>
	</head>
	<body>
		<h1>Oppgave 4: Varesøk</h1>
		<h4>Test skriptet slik: http://itfag.usn.no/~u12345/varesok.php<strong style="color:red;">?navn=Marsipantang</strong></h4>
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
		
		$varenavn = $_GET['navn'];
		

			if (in_array($varenavn, $navneliste)) {
				echo "<h3>Varen <strong>$varenavn</strong> eksisterer</h3>";
			} else {
				echo "<h3>Varen <strong>$varenavn</strong> Eksisterer ikke</h3>";
			}

			
		
		
			

		?>
		
	</body>
</html>