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



function ordreDato ($connect, $bnr) {
	$sql = "INSERT INTO Ordre(Ordredato, BNr) " .
         "VALUES ('" . date('Y-m-d') . "', " . $bnr . ")";

	return mysqli_query($connect, $sql);

}


// Sett inn rad i tabell med autonummerert primærnøkkel,
// og returner primærnøkkelverdien.

function settInn($dblink, $sql) {
  $ok = mysqli_query($dblink, $sql);
  if (!$ok)
    die('<p>Feil i SQL: ' . $sql . ' - ' . mysqli_error($dblink) . '</p>');
  return mysqli_insert_id($dblink);
}

// Utfør SQL-spørring og returner første rad.
function hentForsteRad($dblink, $sql) { 
  $resultat = mysqli_query($dblink, $sql);
  if (!$resultat)
    die('<p>Feil i SQL: ' . $sql . ' - ' . mysqli_error($dblink) . '</p>');
  $rad = mysqli_fetch_assoc($resultat);
  return $rad;
}


?>