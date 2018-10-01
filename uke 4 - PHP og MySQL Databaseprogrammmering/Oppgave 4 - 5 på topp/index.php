<?php
include "hjelpefunksjoner.php";
include "database.php";

$connect = kobleOpp();
toppHTML();

h1('Velkommen til nettbutikken!');
?>

<div id="varesok">
<h2>Varesøk</h2>
<form method="POST" action="varesok.php">
<p>Varenavn: <input type="text" name="txtSok" size="20"></p>
<p>
  <input type="submit" value="Send forespørsel" name="sendKnapp">
  <input type="reset" value="Rensk skjema" name="renskKnapp">
</p>
</form>

<p><a href="vis_alle_varer.php">Se hele varetabellen.</a></p>
</div>

<div id="innlogging">
<h2>Innlogging</h2>
<form method="POST" action="bestilling.php">
<table border="0" width="50%">
<tr>
  <td>Brukernavn:</td>
  <td><input type="text" name="brukernavn" size="10"></td>
</tr>
<tr>
  <td>Passord:</td>
  <td><input type="password" name="passord" size="10"></td>
</tr>
</table>
<p>
  <input type="submit" value="Send forespørsel" name="sendKnapp">
  <input type="reset" value="Rensk skjema" name="renskKnapp">
</p>
</form>
</div>

<?php

h1("Topp 5 Mest Solgte");
visTopp5($connect, 5);
bunnHTML();
kobleNed($connect);
?>
