<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="standard.css">
<title>Databaser og web</title>
<meta charset="UTF-8" />
</head>
<body>
<h1>Innlogging sjekk</h1>

<?php

// http://db-kurs.hit.no/~u12345/sjekk.php?brukernavn=Ola&passord=Hemmelig

$brukernavn = $_GET['brukernavn'];
$passord = $_GET['passord'];

if ($brukernavn == 'Ola' && $passord == 'Hemmelig' || $brukernavn == 'Mari' && $passord == 'Iram')
	echo 'Velkommen';
else
	echo 'Ugyldig brukernavn/passord';

?>

</body>
</html>