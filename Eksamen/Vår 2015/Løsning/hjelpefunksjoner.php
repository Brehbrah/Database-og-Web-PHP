<?php

define("TJENER",	"localhost");
define("BRUKERNAVN",	"root");
define("PASSORD",	"");
define("DB",	"eksamen");

function kobleOpp() {
	$connect = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);
	if(!$connect) {
		die("<h2>Kan ikke kobles til Databasen: </h2>" . mysqli_error($connect));
	}
	mysqli_set_charset($connect, 'utf8');
	return $connect;
}

function lukk($connect) {
	mysqli_close($connect);
}

function toppHTML() {
	echo '<!doctype html>
	<html>
	    <head>
	        <meta charset="utf-8">
	        <meta name="description" content="">
	        <meta name="viewport" content="width=device-width, initial-scale=1">
	        <title>Untitled</title>
	        <link rel="stylesheet" href="css/style.css">
	        <link rel="author" href="humans.txt">
	    </head>
	    <body>';
}

function bunnHTML () {
	echo '</body>
	</html>';
}

function sjekkAtFinnes($connect, $tabell, $kolonne, $verdi) {

	$sql = "SELECT $kolonne
			FROM $tabell
			WHERE $kolonne = ? ";
	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "s", $verdi);
	mysqli_stmt_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);
	$rad = mysqli_num_rows($resultat);

	if($rad == 1) {
		return true;
	} else {
		return false;
	}
}

?>