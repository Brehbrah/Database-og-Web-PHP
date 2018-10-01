<?php 

define("TJENER",	"localhost");
define("BRUKERNAVN",	"root");
define("PASSORD",	"");
define("DB",	"eksamen");

function kobleOpp() {
	$connect = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);

	if(!$connect) {
		die("KAN IKKE KOBLES TIL DB: " . mysqli_error($connect));
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

function bunnHTML() {
	echo '</body>
	</html>';
}

?>