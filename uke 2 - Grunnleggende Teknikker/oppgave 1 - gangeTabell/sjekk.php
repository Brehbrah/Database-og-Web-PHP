<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">
		<style>
			.border {
				border: 2px solid black;
				padding: 10px;
				border-radius: 25px;
			}

			h1 {
				color: blue;
			}
		</style>
	</head>
	<body>
		<h1>Oppgave 2 - Innlogginssjekk</h1>
		<div class="border">
			<h3>Husk å bruke url for å logge inn ved hensyn på slutten av linken f.eks.:</h3>
			<p>http://itfag.usn.no/~u12345/<strong style="color: red;">sjekk.php?brukernavn=Ola&passord=Hemmelig</strong></p>
			
			<p>HINT: Når det står <strong style="color:red;">"Notice: Undefined index"</strong> så betyr det at php finner ikke noe verdi av en indeks. I dette tilfelle er det da brukernavn og passord</p>
		</div>
		
		
		<hr>
		<?php
		// Husk å bruke url addresset for å logge inn. URL linken er eks. under
		//http://localhost:84/php/uke%202%20-%20Grunnleggende%20Teknikker/oppgave%201%20-%20gangeTabell/sjekk.php?brukernavn=Mari&passord=Iram
			$brukernavn = $_GET['brukernavn'];
			$passord = $_GET['passord'];
			if($brukernavn == 'Ola' && $passord == 'Hemmelig' || $brukernavn == 'Mari' && $passord == 'Iram') {
				echo "<h1>Velkommen $brukernavn</h1>";
			} else {
				echo "<h1>Ugyldig innlogging!</h1>";
			}
		?>
	</body>
</html>