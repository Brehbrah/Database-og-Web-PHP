<?php 

define("TJENER", "localhost");
define("BRUKERNAVN", "root");
define("PASSORD",	"");
define("DB",	"eksamen2018");

function kobleOppDB() {
	$connect = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);

	if(!$connect) {
		die("KAN IKKE KOBLES TIL DATABASE: " .	mysqli_error($connect));
	}

	mysqli_set_charset($connect, "utf-8");

	return $connect;
}

function lukkDB($connect) {
	mysqli_close($connect);
}

function toppHTML() {
	echo '<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">
	</head>
	<body> ';
}

function bunnHTML() {
	echo '</body>
	</html>';
}

function h1($h1) {
	echo "<h1>$h1</h1>";
}


?>