<?php

define("TJENER",	"localhost");
define("BRUKERNAVN",	"root");
define("PASSORD",	"");
define("DB",	"hobbyhuset");

function kobleOpp() {
	$connect = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);

	if(!$connect) {
		die("Kan ikke kobles opp til databasen!" . mysqli_errno($connect));
	}
	mysqli_set_charset($connect, 'utf8');
	return $connect;
}

function kobleNed($connect) {
	mysqli_close($connect);
}

// Sjekker om brukeren eksisterer ved hensyn av Session(cookies)
function gyldigBruker($connect, $brukernavn, $passord) {
	$sql = "SELECT * FROM Bruker " .
		   "WHERE epost = '$brukernavn' AND passord = '$passord'";
	$resultat = mysqli_query($connect, $sql);
    $antall = mysqli_num_rows($resultat);
	if ($antall == 1) {
		$rad = mysqli_fetch_assoc($resultat);
		$_SESSION['bnr'] = $rad['BNr'];
		$_SESSION['brukernavn'] = $rad['Epost'];
		$_SESSION['passord'] = $rad['Passord'];
		$_SESSION['fornavn'] = $rad['Fornavn'];
		$_SESSION['etternavn'] = $rad['Etternavn'];

		return true;
	} else {
		return false;
	}
}


?>