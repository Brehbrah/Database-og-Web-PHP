<?php
$innlogget = false;
$melding = "<h2>Innlogging</h2>";

if (isset($_REQUEST["brukernavn"]) && isset($_REQUEST["passord"])) {

  // NB! Prepared statements er en bedre løsning enn mysqli_real_escape_string
  $brukernavn = mysqli_real_escape_string($dblink, $_REQUEST['brukernavn']);
  $passord = mysqli_real_escape_string($dblink, $_REQUEST['passord']);

  if (gyldigBruker($dblink, $brukernavn, $passord)) {
    echo "<p><a href=\"bestilling.php\">Gå til bestilling.</p>";
	  echo "<p><a href=\"endrepassord.php\">Endre passord.</p>";
	  $innlogget = true;
  }
  else {
    $melding .= "<p>Feil brukernavn/passord!</p>";
  }
}

if (!$innlogget) {
  echo $melding;
?>

<form method="POST" action="">
<table border="0" width="50%">
<tr>
  <td>Brukernavn:</td>
  <td><input type="text" name="brukernavn" size="40"></td>
</tr>
<tr>
  <td>Passord:</td>
  <td><input type="password" name="passord" size="10"></td>
</tr>
</table>
<p>
  <input type="submit" value="Logg inn" name="sendKnapp">
  <input type="reset" value="Rensk skjema" name="renskKnapp">
</p>
</form>
<?php
}
?>
