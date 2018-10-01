<?php

define("TJENER",	"localhost");
define("BRUKERNAVN",	"root");
define("PASSORD",	"");
define("DB",	"hobbyhuset");

function kobleOpp () {
	$connect = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);
	if(!$connect) {
		echo "<h1>Kan ikke kobles til databasen!" . mysqli_errno($connect) . "</h1>";
	}
	mysqli_set_charset($connect, 'utf8');
	return $connect;
} 

function lukk($connect) {
	mysqli_close($connect);
}

function oppg1 ($connect, $varekode) {
	$vnr = $varekode;

	$sql = "SELECT hent_varenavn('$vnr') varenavn 
			FROM Vare 
			WHERE Varekode = ? ";
	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "i", $vnr);
	mysqli_stmt_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);

	$rad = mysqli_fetch_assoc($resultat);
	$navn = $rad['varenavn'];
	echo "<h2>Oppgave 1 - Hent varenavn:</h2>"; 

	echo "<table border = '1'>";
		echo "<tr>"; 
			echo "<th>Varenavn</th>";
		echo "</tr>";

		echo "<tr>"; 
			echo "<td>$navn</td>";
		echo "</tr>";
	echo "</table>";

}

function oppg2($connect, $varekode) {

	$vnr = $varekode;
	// Her kaller vi opp prosedyren som ble laget i databasen

	$sql = "CALL hent_vare('$vnr', @vnavn, @pris, @ant)";
	mysqli_query($connect, $sql);


	// Deretter velger SELECT-setningen brukes til å velge data fra en database. 
	// Når det står '@Ett eller annet', så vil det peke SELECT fra originale databasen
	// 
	$sql = "SELECT @vnavn varenavn, @pris pris, @ant antall 
			FROM Vare 
			WHERE Varekode = ? ";

	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, 'i', $vnr);
	mysqli_stmt_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);
	
	$rad = mysqli_fetch_assoc($resultat);
	
	$navn = $rad['varenavn'];
	$pris = $rad['pris'];
	$antall = $rad['antall'];

	echo "<h3>Oppgave 2 - Hent vare</h3>";

	echo "<table border = '1' style='text-align: center;'>";
		echo "<tr>";
			echo "<th>Betegnelse</th>";
			echo "<th>Pris</th>";
			echo "<th>Antall Lager</th>";
		echo "</tr>";

		echo "<tr>";
			echo "<td>$navn</td>";
			echo "<td>$pris Kr.</td>";
			echo "<td>$antall</td>";
		echo "</tr>";
	echo "</table>";
}


function oppg3 ($connect, $varekode, $betegnelse, $pris, $lager, $aktiv) {

	$sql = "CALL ny_vare('$varekode', '$betegnelse', '$pris', '$lager', '$aktiv') "; 

	// ToDo list:
	// Skjønner ikke hvorfor den ikke klarer å finne "index" fra prosedyren fra DB

	/*$sql = "SELECT *
			From Vare 
			WHERE Varekode = ? AND 
			Betegnelse = ? AND 
			PrisPrEnhet = ? AND
			LagerAntall = ? AND 
			ErAktiv = ? ";
	
	mysqli_query($connect, $sql);*/

	$stmt = mysqli_prepare($connect, $sql) OR die (mysqli_error($connect));
	//mysqli_stmt_bind_param($stmt, 'isdis', $vkode, $vbetegnelse, $vpris, $vlager, $akt);
	mysqli_stmt_execute($stmt);

	$resultat = mysqli_stmt_get_result($stmt); 

	$rad = mysqli_fetch_assoc($resultat) OR die (mysqli_error($connect));

	$kvittering = $rad['v_txtUt'];

	echo "<h2>Oppgave 3 - Ny Vare Registrering</h2> $kvittering";

}

function oppg4Test ($connect, $varekode) {

	$sql = "CALL slett_vare('$varekode', @status_ut) ";

	mysqli_query($connect, $sql);

	$sql = "SELECT @status_ut FROM Vare WHERE varekode = ?";

	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, 'i', $varekode);
	mysqli_stmt_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);
	$rad = mysqli_fetch_assoc($resultat);

	$kvittering = $rad['@status_ut'];
	echo $kvittering;


}

function oppg4 ($connect, $varekode) {
	$vnr = $varekode;

	$sql = "CALL slett_vare('$vnr', @tekstUt) ";
	mysqli_query($connect, $sql);

	$sql = "SELECT @kvittering";
	mysqli_query($connect, $sql);

	$sql = "SELECT * 
			FROM Vare 
			WHERE Varekode = ? ";

	mysqli_query($connect, $sql);

	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, 'i', $vnr) OR die (mysqli_error($connect));
	mysqli_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);

	$rad = mysqli_fetch_assoc($res);

	$kvittering = $rad['@tekstUt'];
}


function oppg4Alt ($connect, $varekode) {

	$vnr = $varekode;

	$sql = "CALL slett_vare('$vnr', @kvittering) ";

	mysqli_query($connect, $sql);
	$sql = "SELECT @kvittering";

	$resultat = mysqli_query($connect, $sql);
	$rad = mysqli_fetch_assoc($resultat);

	$kvittering = $rad['@kvittering'];

	echo "<h2>Oppgave 4 - Slett Vare</h2> $kvittering";
}

function oppg5 ($connect, $vkode, $vpris) {

	$sql = "CALL endre_varepris('$vkode', '$vpris', @kvittering) ";
	mysqli_prepare($connect, $sql);

	$sql = "SELECT @kvittering FROM Vare WHERE varekode = ? AND prisPrEnhet = ? ";
	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, 'ii', $vkode, $vpris);
	mysqli_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);
	$rad = mysqli_fetch_assoc($resultat);
	$kvittering = $rad['@kvittering'];
	echo "<h2>Oppgave 5 - Endre varepris</h2> $kvittering";
}

function oppg6($connect, $vkode, $vbetegnelse, $vpris, $vlager, $vAktiv) {

	$vnr= $vkode;
	$navn = $vbetegnelse;
	$pris = $vpris;
	$lager= $vlager;
	$aktiv = $vAktiv;

	$sql = "CALL ny_vare2($vnr, $navn, $pris, $lager, $aktiv, @statusUt, @meldingUt)";
	mysqli_query($connect, $sql);

	$sql = "SELECT @statusUt, @meldingUt";
	$res = mysqli_query($connect, $sql);

	$rad = mysqli_fetch_assoc($res);

	$status = $rad['@statusUt'];
	$melding = $rad['@meldingUt'];

	echo "<h2>Oppgave 6. Statuskode og feilmelding</h2> $status . $melding";

}

?>