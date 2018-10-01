<?php

define("TJENER",	"localhost");
define("BRUKERNAVN",	"root");
define("PASSORD",	"");
define("DB",	"eksamen");

function kobleOpp() {

	$connect = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);
	if (!$connect) {
		die("Error kan ikke koble til Databasen"	.	mysqli_error($connect));
	}
	mysqli_set_charset($connect, 'utf8');
	return $connect;
} 

function lukk($connect) {
	mysqli_close($connect);
}

function viseBruker($connect, $fornavn, $etternavn) {
	$sql = "SELECT * FROM bruker WHERE Fornavn = '$fornavn' AND Etternavn = '$etternavn' ";
	return mysqli_query($connect, $sql);
}

?>