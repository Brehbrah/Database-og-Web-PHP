<?php
include "database.php";
include "hjelpefunksjon.php";

if (isset($_GET["varekode"])) {
  $varekode = $_GET["varekode"];
  $dblink = kobleOpp();
  $vare = hentVare($dblink, $varekode);
  $betegnelse = $vare["Betegnelse"];
  $pris = $vare["PrisPrEnhet"];
  $antall = $vare["LagerAntall"];
}
else {
  $varekode = "";
  $forbindelse = "";
  $vare = "";
  $betegnelse = "";
  $pris = "";
  $antall = "";
}

$connect = kobleOpp();
toppHTML();
?>

	<h1>Redigere vare</h1>
		<form action="oppdatert.php" method="POST" accept-charset="utf-8">
			<table border ="0">
				<tr>
					<td>Varekode:</td>
					<td><input type="text" name="varekode"></td>
				</tr>
				<tr>
					<td>Betegnelse:</td>
					<td><input type="text" name="betegnelse"></td>
				</tr>
				<tr>
					<td>Pris kr.:</td>
					<td><input type="text" name="pris"></td>
				</tr>
				<tr>
					<td>Antall på Lager:</td>
					<td><input type="text" name="antallLager"></td>
				</tr>	
			</table><!--table-->
			<p>
				Oppdater <input type="radio" name="operasjon" value="1" checked>&nbsp;&nbsp;&nbsp;
				Ny <input type="radio" name="operasjon" value="2" /> &nbsp;&nbsp;&nbsp;
				Slett <input type="radio" name="operasjon" value="3">
			</p>
			<p>
				<input type="submit" name="utfør" name="send">
			</p>

			


		</form>
<?php
bunnHTML();
kobleNed($connect);
?>