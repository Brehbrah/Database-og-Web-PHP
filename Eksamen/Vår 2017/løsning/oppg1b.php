<?php 

include_once "hjelpefunksjoner.php";

function sjekkAtFinnes($connect, $tabell, $kolonne, $heltall) {
	$sql = "SELECT $kolonne
			FROM $tabell 
			WHERE $kolonne = ? ";
	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "i", $heltall);
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