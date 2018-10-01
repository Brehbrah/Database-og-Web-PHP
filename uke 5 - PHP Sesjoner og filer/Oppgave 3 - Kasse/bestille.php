<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
session_start();


include "database.php";
include "hjelpefunksjoner.php";


toppHTML();
$connect = kobleOpp();

$ok = false;
if (!isset($_SESSION["brukernavn"])) {

  if (isset($_REQUEST["brukernavn"]) && isset($_REQUEST["passord"])) {

    $brukernavn = $_REQUEST["brukernavn"];
    $passord = $_REQUEST["passord"];

    $ok = gyldigBruker($connect, $brukernavn, $passord);

    if ($ok) {
      $_SESSION["kurv"] = array();
    } else {
      echo '<p>Innlogging feilet!</p>';
    }
  }
} else {
	// Bygges videre til handle vogn

	if (isset($_REQUEST["txtVare"]) && isset($_REQUEST["txtAntall"])) {

		$varekode = $_REQUEST['txtVare'];
		$antall = $_REQUEST['txtAntall'];

		if (!empty($varekode) && is_numeric($antall)) {
			$_SESSION["kurv"][$varekode] = $antall;
			$ok = true;
		} else if (empty($varekode) && !is_numeric($antall)) {
			echo "<h2>Du må skrive inn vareNr og antall!</h2>";
		} else if (!is_numeric($antall)) {
		 	echo "<h2>Kan ikke være mindre enn null!</h2>";
		} 
	} 
}


if ($ok) {

	$navn = $_SESSION["fornavn"] . ' '. $_SESSION["etternavn"];

	echo "<h1>Velkommen $navn</h1>";

	?>

	<form action="" method="POST" accept-charset="utf-8">
		
		<table border = "0">
			<tr>
				<th>VareNr:</th>
				<td><input type="text" name="txtVare" size="20" placeholder="Varenummer"></td>
			</tr>

			<tr>
				<th>Antall Ordrer:</th>
				<td><input type="text" name="txtAntall" size="20" placeholder="Antall Bestillinger"></td>
			</tr>
		</table>	
		<p>
			<button type="submit">submit</button>
			<button type="reset">Reset</button>
			<a href="loggut.php">Logg ut</a>
		</p>
	</form>
	  <p><a href="kasse.php">Gå til kasse</a></p>
	<?php	
}


bunnHTML();
kobleNed($connect);

?>