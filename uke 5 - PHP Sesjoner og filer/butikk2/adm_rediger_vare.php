<?php
include_once("hjelpefunksjoner.php");
include_once("database.php");

if (isset($_GET["varekode"])) {
  $varekode = $_GET["varekode"];
  $dblink = kobleOpp();
  $vare = hentVare($dblink, $varekode);
  $betegnelse = $vare["Betegnelse"];
  $pris = $vare["PrisPrEnhet"];
  $antall = $vare["LagerAntall"];
}
else {
  $varekode = "";
  $forbindelse = "";
  $vare = "";
  $betegnelse = "";
  $pris = "";
  $antall = "";
}

topp();

echo
  "<h1>Rediger vare</h1>
  <form method=\"POST\" action=\"adm_vare_operasjon.php\">
  <table width=\"60%\">
  <tr>
  <td>Varekode:</td>
  <td><input type=\"text\" name=\"varekode\" size=\"20\" value = \"$varekode\" /></td>
  </tr>
  <tr>
  <td>Betegnelse:</td>
  <td><input type=\"text\" name=\"betegnelse\" size=\"30\" value = \"$betegnelse\" /></td>
  </tr>
  <tr>
  <td>Pris kr.:</td>
  <td><input type=\"text\" name=\"pris\" size=\"10\" value = \"$pris\" /></td>
  </tr>
  <tr>
  <td>Antall på lager:</td>
  <td><input type=\"text\" name=\"antall\" size=\"10\" value = \"$antall\" /></td>
  </tr>
  </table>
  <p>
  Oppdater <input type=\"radio\" name=\"operasjon\" value=\"1\" checked /> &nbsp;&nbsp;&nbsp;
  Ny <input type=\"radio\" name=\"operasjon\" value=\"2\" /> &nbsp;&nbsp;&nbsp;
  Slett <input type=\"radio\" name=\"operasjon\" value=\"3\" />
  </p>
  <p>
  <input type=\"submit\" value=\"Utfør\" name=\"btnSend\" />
  </p>
  </form>";

bunn();
?>
