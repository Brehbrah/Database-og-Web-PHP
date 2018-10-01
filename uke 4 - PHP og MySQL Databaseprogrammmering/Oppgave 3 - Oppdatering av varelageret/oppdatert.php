<?php

include "database.php";
include "hjelpefunksjon.php";


$connect = kobleOpp();
toppHTML();


// Henter skjemadata
$varekode = $_REQUEST['varekode'];
$betegnelse = $_REQUEST['betegnelse'];
$pris = $_REQUEST['pris'];
$antall = $_REQUEST['antallLager'];
$operasjon = $_REQUEST['operasjon'];

// Her bygges det SQL-kode

if ($operasjon == 1) {
	echo "<h1>Oppdatert Vareliste</h1>";
	

	echo '<h2>Kvittering for varelisten</h2>';

	if (oppdaterVare($connect, $betegnelse, $pris, $antall, $varekode)) {	
		echo "<table border ='0'>";
		echo '<tr>';
			echo "<td>Varekode: $varekode</td>";
		echo '</tr>';
		echo '<tr>';
			echo "<td>Betegnelse: $betegnelse</td>";
		echo '</tr>';
		echo '<tr>';
			echo "<td>pris: $pris</td>";
		echo '</tr>';
		echo '<tr>';
			echo "<td>antall: $antall</td>";
		echo '</tr>';

	echo "</table>";
	} else {
		
	}
	
} else if ($operasjon == 2) {
	echo "<h1>Oppdatert Ny Vareliste</h1>";

		if (nyVare($connect, $varekode, $betegnelse, $pris, $antall)) {
			echo "<h2>Ny Oppdatert kvittering for <b style = 'color: red;'>$betegnelse</b></h2>";
			echo '<table border = "0">';
				echo '<tr>';
					echo "<td>Varekode: $varekode</th>";
				echo '</tr>';
				echo '<tr>';
					echo "<td>Betegnelse: $betegnelse</th>";
				echo '</tr>';
				echo '<tr>';
					echo "<td>Pris: $pris</th>";
				echo '</tr>';
				echo '<tr>';
					echo "<td>AntallLager: $antall</th>";
				echo '</tr>';
			echo '</table>';
		} else {
			echo "<h3>Det mangler opplysninger!</h3>";
	}
} else if ($operasjon == 3) {

	echo "<h1>Varelisten <strong style='color: red;'>$betegnelse</strong> er slettet</h1>";

	slettVare($connect, $varekode);

	echo '<table border = "0">';
		echo "<tr>";
			echo "<td>Vare Nr.: $varekode</td>";
		echo "</tr>";
	echo '</table>';
} else {
	echo "<h1>Oyy!!! Trykk på noe for å slette faen!</h1>";
}

bunnHTML();
kobleNed($connect);

?>