<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">
	</head>
	<body>
		<?php
		$brukere = array (
		'Ola' => 'Hemmelig',
		'Mari' => 'Iram'
		);
		$brukernavn = $_REQUEST['brukernavn'];
		$passord = $_REQUEST['passord'];
		

		if(array_key_exists($brukernavn, $brukere)) {
			echo "<h1>Velkommen $brukernavn</h1>";
		} else {
			echo "<h1>Ugyldig passord eller brukernavn</h1>";
		}

			
		
		?>
		
		
		
	</body>
</html>