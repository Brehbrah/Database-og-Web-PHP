<?php
include_once "hjelpefunksjoner.php";
include_once "database.php";

topp();
$dblink = kobleOpp();

$brukernavn = $_REQUEST['brukernavn'];
$passord = $_REQUEST['passord'];

if (!gyldigBruker($dblink, $brukernavn, $passord)) {
  echo '<p>Innlogging feilet, prøv igjen!</p>';
}
else {
  echo "<p>Velkommen $brukernavn!</p>";
  
  ?>

  <!--
    Foreløpig for enkel løsning: Blir sendt direkte
    til kassen etter bestilling av den første varen.
  -->
  
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
  
  lukk($dblink);
}

bunn();
?>
