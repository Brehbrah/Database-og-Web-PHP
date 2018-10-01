<?php
session_start();

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
<?php
include_once "logginn.php";
?>
</div>

<?php
lukk($dblink);
bunn();
?>
