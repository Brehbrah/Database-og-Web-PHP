<?php
session_start();
include_once "hjelpefunksjoner.php";
include_once "database.php";
$dblink = kobleOpp();
sjekkInnlogging();
topp();
h1('Varebestilling');

if (isset($_REQUEST["txtVnr"]) && isset($_REQUEST["txtAntall"])) {
	
	// NB! Prepared statements er en bedre løsning enn mysqli_real_escape_string
$varekode = mysqli_real_escape_string($dblink, $_REQUEST["txtVnr"]);
$antall = mysqli_real_escape_string($dblink, $_REQUEST["txtAntall"]);

if (!empty($varekode) && is_numeric($antall)) {

$_SESSION["kurv"][$varekode] = $antall;

} else {
print('<p>Ugyldige inndata!</p>');
}
}
$navn = $_SESSION['fornavn'] . ' ' . $_SESSION['etternavn'];
print("<p>Velkommen $navn!</p>");
?>
<form method="POST" action="">
	<table border="0" width="50%">
		<tr>
			<td>Varenummer:</td>
			<td><input type="text" name="txtVnr" size="10"></td>
		</tr>
		<tr>
			<td>Antall enheter:</td>
			<td><input type="text" name="txtAntall" size="10"></td>
		</tr>
	</table>
	<p>
		<input type="submit" value="Bestill" name="sendKnapp">
		<input type="reset" value="Rensk skjema" name="renskKnapp">
	</p>
</form>

<p><a href="kasse.php">Gå til kasse</a></p>
<?php
lukk($dblink);
bunn();
?>