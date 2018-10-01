<?php 

include_once "hjelpefunksjoner.php";

$connect = kobleOpp();
toppHTML();

$baneNr = $_GET['golfbane'];
$dato = $_GET['dato'];
$spillere = array();

if(isset($_GET['spiller1'])) {
	$spillere[] = $_GET['spiller1'];
}

if(isset($_GET['spiller2'])) {
	$spillere[] = $_GET['spiller2'];
}

if(isset($_GET['spiller3'])) {
	$spillere[] = $_GET['spiller3'];
} 

if(isset($_GET['spiller4'])) {
	$spillere[] = $_GET['spiller4'];
}

	// Viser Beskrivelse av Runden 
	$rundeNr = mysqli_insert_id($connect);
	
	$sql = "SELECT r.*, b.*
			FROM runde AS r, bane AS b
			WHERE r.RundeNr = ? 
			OR r.Dato = ?  ";
	$stmt = mysqli_prepare($connect, $sql);
	mysqli_stmt_bind_param($stmt, "is", $baneNr, $dato);
	mysqli_stmt_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);
	$rad = mysqli_fetch_assoc($resultat);

	$baneNr = $rad['RundeNr'];
	$dato = $rad['Dato'];
	$golfbane = $rad['Navn'];

?>

<h1>Registrere Antall Slag</h1>

<?php 
	// Printer resultatet av beskrivelsen av runden
	echo "Runde $baneNr på $golfbane golfbane $dato"; 
?>

<form action="" id="regSkjema" method="POST" accept-charset="utf-8">
	<p>
		<label>Hull: </label>
		<input type="text" id="hull" name="hull" placeholder="Hullnummer 1-18">
		<div id="melding"></div>
	</p>
	<p>
		<label>
			<?php
			echo "<table border ='0'>";
				// Henter spiller tabellen
				foreach ($spillere as $rad) {

					$sql = "SELECT *
							FROM spiller
							WHERE SpillerNr = $rad ";
					$spiller = mysqli_query($connect, $sql);
					$hentRad = mysqli_fetch_assoc($spiller);

					$fornavn = $hentRad['Fornavn'];
					$etternavn = $hentRad['Etternavn'];

					echo "<tr>";
						echo "<td>Spiller $rad - $fornavn $etternavn: &nbsp; </td>";
						echo "<td><input type='text' id='positiv' name='spiller' placeholder='Antall Slag'><br></td>";
						echo "<td><div id='melding'></div></td>";
					echo "</tr>";
				}
				echo "</table>";
			?>	
		</label>
	</p>
	<p>
		<button type="submit" id="submit" name="submit">Registrer Resultat</button>
	</p>
	<script src="oppg1a-2.js"></script>
</form>

<?php
bunnHTML();
lukk($connect);

?>