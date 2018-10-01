<?php
session_start();
session_destroy();

include "database.php";
include "hjelpefunksjoner.php";

$connect = kobleOpp();
toppHTML();

if (!isset($_SESSION["brukernavn"])) {

	if ($_REQUEST["brukernavn"] && $_REQUEST["passord"]) {

		$brukernavn = $_REQUEST['brukernavn'];
		$passord = $_REQUEST['passord'];

		$ok = gyldigBruker($connect, $brukernavn, $passord);

		if ($ok) {

			$_SESSION['kurv'] = array();

			$navn = $_SESSION["fornavn"] . ' ' . $_SESSION["etternavn"];
			echo "<h2>Velkommen $navn</h2>";
			?>

			<form action="" method="GET" accept-charset="utf-8">
			<table border="0">
				<tr>
					<td>VareNr:</td>
					<td><input type="text" name="vare" placeholder="VareNr" size="20"></td>
				</tr>

				<tr>
					<td>Antall Enheter:</td>
					<td><input type="text" name="antall" placeholder="Antall Ordre" size="20"></td>
				</tr>
			</table>
			<p>
				<button type="submit">Submit</button>
				<button type="reset">Reset</button>
			</p>

		</form>
		<a href="kasse.php">Gå til kassen</a>

			<?php
		}
	} else {
		echo "<h1>Feil Innlogging</h1>";
	}
} else {

}

kobleNed($connect);
?>