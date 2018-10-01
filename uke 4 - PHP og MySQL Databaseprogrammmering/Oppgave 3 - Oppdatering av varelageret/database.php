<?php

define("TJENER",	"localhost");
define("BRUKERNAVN", "root");
define("PASSORD",	"");
define("DB",	"hobbyhuset");


function kobleOpp() {
	$connect = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);
	if (!$connect) {
		echo "<h1>Kan ikke kobles til databasen!</h1>";
	}
	mysqli_set_charset($connect, 'utf8');
	return $connect;
}

function kobleNed($connect) {
	mysqli_close($connect);
}

function oppdaterVare($connect, $betegnelse, $pris, $antall, $varekode) {
	$sql = "UPDATE Vare " .  
		   "SET Betegnelse = '$betegnelse', " . 
		   "prisPrEnhet = '$pris', " . 
		   "lagerAntall = '$antall' " . 
		   "WHERE Varekode = '$varekode' ";
   return mysqli_query($connect,$sql);

}

function nyVare ($connect, $varekode, $betegnelse, $pris, $antall) {
	$sql = "INSERT INTO Vare(Varekode, Betegnelse, PrisPrEnhet, LagerAntall) " .
         "VALUES ('$varekode', '$betegnelse', '$pris', '$antall' )";
		return mysqli_query($connect, $sql);
}

function slettVare($connect, $varekode) {

	$sql = "DELETE FROM Vare " . 
		   "WHERE Varekode = '$varekode'";
	return mysqli_query($connect, $sql);

}




?>