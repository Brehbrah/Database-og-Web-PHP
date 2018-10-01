<?php
// Oppretter/resumere sesjonen for basert av GET eller POST request 
session_start();

// Ødelegger alle data fra sesjonen
// Tips: Kan være fint for å teste ting bl.a.
session_destroy();

include_once "hjelpefunksjoner.php";
include_once "database.php";

topp();
$dblink = kobleOpp();

$ok = false;

// sjekker om variabelen ikke eksisterer via !isset() metoden, så i dette situasjonen er brukernavnet som kobles opp til databasen

// $_SESSION["brukernavn"]; gjør at du lagerer sesjons data
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

// Vise frem navnet til brukeren

if ($ok) {
  $navn = $_SESSION['fornavn'] . ' ' . $_SESSION['etternavn'];

  echo "<h2>Velkommen $navn!</h2>";
  ?>

  <form method="POST" action="kasse.php">
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
    <?php
} 



  
  lukk($dblink);


bunn();
?>
