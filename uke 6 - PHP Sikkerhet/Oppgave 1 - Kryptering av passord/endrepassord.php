<?php
session_start();

include_once "hjelpefunksjoner.php";
include_once "database.php";

$dblink = kobleOpp();
sjekkInnlogging();

toppHTML();

echo "<h1>Endre passord</h1>";

$navn = $_SESSION['fornavn'] . ' ' . $_SESSION['etternavn'];
print("<p>Velkommen $navn !</p>");

if (isset($_REQUEST["passord"])) {
  $bnr = $_SESSION['bnr'];
  
  // NB! Prepared statements er en bedre løsning enn mysqli_real_escape_string
  $passord = mysqli_real_escape_string($dblink, $_REQUEST["passord"]);
  
  if (strlen($passord) < 3) // En alt for enkel passordregel...
    echo "<p>Minimum 8 tegn i passordet!</p>";
  else {

    // Burde også brukt tilfeldig "salt", se PHP-dokumentasjonen.
    // I nyere versjoner av PHP kan man i stedet bruke password_hash for
    // å kryptere og password_verify for å sjekke.

  	echo "<h2>Passordet endret!</h2>";

    //$kryptert = crypt($passord);
    $kryptert = password_hash($passord, PASSWORD_BCRYPT, array($passord));
    
    $sql = "UPDATE Bruker SET Passord = '$kryptert' WHERE BNr = $bnr;";
    mysqli_query($dblink, $sql);
  }
}
?>

<form method="POST" action="">
<table border="0" width="50%">
  <td>Nytt passord:</td>
  <td><input type="password" name="passord" size="10"></td>
</tr>
</table>
<p>
  <input type="submit" value="Endre passord" name="sendKnapp">
  <input type="reset" value="Rensk skjema" name="renskKnapp">
</p>
</form>
<p><a href="index.php">Gå til hovedside.</p>

<?php
kobleNed($dblink);
bunnHTML();
?>
