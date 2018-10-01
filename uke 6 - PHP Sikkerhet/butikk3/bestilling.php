<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
session_start();

include_once "hjelpefunksjoner.php";
include_once "database.php";

topp();
$dblink = kobleOpp();

h1('Varebestilling');

$ok = false;

// Første gang sjekker vi innlogging og oppretter tom handlekurv
if (!isset($_SESSION["brukernavn"])) {
  if (isset($_REQUEST["brukernavn"]) && isset($_REQUEST["passord"])) {
    $brukernavn = $_REQUEST['brukernavn'];
    $passord = $_REQUEST['passord'];
    $ok = gyldigBruker($dblink, $_REQUEST["brukernavn"], $_REQUEST["passord"]);
    if ($ok) {
      $_SESSION["kurv"] = array();
    }
    else
      echo '<p>Innlogging feilet!</p>';
  }
}
else { // Deretter bygger vi ut handlekurven
  if (isset($_REQUEST["txtVnr"]) && isset($_REQUEST["txtAntall"])) {
    $varekode = $_REQUEST["txtVnr"];
    $antall = $_REQUEST["txtAntall"];
    if (!empty($varekode) && is_numeric($antall)) {
      $_SESSION["kurv"][$varekode] = $antall;
      $ok = true;
    }
    else
      echo '<p>Ugyldige inndata!</p>';
  }
  else
    echo '<p>Du må skrive inn varenr og antall!</p>';
}

if ($ok) {
  $navn = $_SESSION['fornavn'] . ' ' . $_SESSION['etternavn'];
  echo "<p>Velkommen $navn !</p>";
  
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
}

bunn();
?>
