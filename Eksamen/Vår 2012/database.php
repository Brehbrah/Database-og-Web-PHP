<?php

define("TJENER",	"localhost");
define("BRUKERNAVN",	"root");
define("PASSORD",	"");
define("DB",	"politi"); 

function kobleOpp () {
	$connect = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);
	if(!$connect) {
		die("<h2>Kan ikke kobles til Database: </h2>" . mysqli_error($connect));
	}
	mysqli_set_charset($connect, 'utf8');
	return $connect;
}

function lukk($connect) {
	mysqli_close($connect);
}


?>