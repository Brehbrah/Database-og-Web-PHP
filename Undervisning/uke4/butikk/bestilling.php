<?php
include "hjelpefunksjoner.php";
include "database.php";

topp();

$brukernavn = $_REQUEST['brukernavn'];
$passord = $_REQUEST['passord'];

if (!array_key_exists($brukernavn, $brukere)) {
  echo "Brukernavn $brukernavn finnes ikke";
}
else {
  if ($brukere[$brukernavn] == $passord) {
    echo "<h1>Varebestilling</h1>
      <p>Velkommen  $brukernavn !</p>
      <form method=\"POST\" action=\"kasse.php\">
      <table border=\"0\" width=\"50%\">
      <tr>
      <td>Varenummer:</td>
      <td><input type=\"text\" name=\"txtVnr\" size=\"10\"></td>
      </tr>
      <tr>
      <td>Antall enheter:</td>
      <td><input type=\"text\" name=\"txtAntall\" size=\"10\"></td>
      </tr>
      </table>
      <p>
      <input type=\"submit\" value=\"Send forespørsel\" name=\"sendKnapp\">
      <input type=\"reset\" value=\"Rensk skjema\" name=\"renskKnapp\">
      </p>
      </form>";
  }
  else {
    echo "<h1>Ugyldig passord!</h1>";
  } 
}

bunn();
?>
