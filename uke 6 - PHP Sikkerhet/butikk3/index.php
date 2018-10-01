<?php
include_once "hjelpefunksjoner.php";
include_once "database.php";

topp();
$dblink = kobleOpp();
?>

<h1>Velkommen til nettbutikken!</h1>

<!-- Skjema for å finne varer mhp varenavn. -->
<div id="varesok">
<h2>Varesøk</h2>
<form method="POST" action="varesok.php">
<p>Varenavn: <input type="text" name="txtSok" size="20"></p>
<p>
  <input type="submit" value="Søk" name="sendKnapp">
  <input type="reset" value="Rensk skjema" name="renskKnapp">
</p>
</form>
</div>

<!-- Vis de 5 mest solgte produktene på hovedsiden. -->
<div id="bestselgere">
<h2>5 på topp</h2>
<?php
visBestselgere($dblink, 5);
?>
</div>

<!-- Innlogging for registrerte kunder. -->
<div id="innlogging">
<h2>Innlogging</h2>
<form method="POST" action="bestilling.php">
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
</div>

<?php
lukk($dblink);
bunn();
?>
