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
		<h1>Oppgave 5: Vis vareliste med pris</h1>
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
		$priser = array
		(
		17.50,
		14.50,
		118.00,
		298.50,
		57.50,
		57.50,
		38.00,
		32.00,
		209.00,
		24.50,
		75.00,
		115.00,
		106.00,
		57.00,
		75.50
		);
		$varenavn = $_GET['navn'];
		$i = 0;
		$vareliste = count($navneliste);
		$funnet = false;

		// Leter fra begynnelsen av tabellen
		while ($i < $vareliste && !$funnet) {
		// Hvis vi finner varen avbryter vi løkka
		if ($varenavn==$navneliste[$i])
		$funnet=true;
		else
		$i++;
		}
		
		// Skriver ut resultatet av søket
		if ($funnet) {
		$pris = $priser[$i];
		echo"<h1><strong>$varenavn</strong> koster kr <strong>$pris,-</strong></h1>";
		}
		else {
		print('<h1>' . $varenavn . ' finnes ikke</h1>');
		}
		
		?>
		
	</body>
</html>