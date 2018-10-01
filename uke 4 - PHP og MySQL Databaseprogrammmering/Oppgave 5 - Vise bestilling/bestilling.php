<?php
include "hjelpefunksjoner.php";
include "database.php";

$connect = kobleOpp(); 
topp();

$brukernavn = $_REQUEST['brukernavn'];
$passord = $_REQUEST['passord'];

if (!gyldigbruker($connect, $brukernavn, $passord)) {
  echo "Brukernavn $brukernavn finnes ikke";
} else {  
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
}

bunn();
kobleNed($connect);
?>
