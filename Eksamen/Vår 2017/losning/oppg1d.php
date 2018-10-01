<?php
session_start();

include_once "hjelpere.php";

// Oppretter sesjonsvariabel for testing
$_SESSION['anr'] = 2;
$leder = $_SESSION['anr'];

topp();
$db = kobleOpp();

echo "<h1>Oppgave 1d</h1>";

SELECT a.ANr, r.RNr, Fornavn, a.Etternavn, r.Beskrivelse, r.FraDato, r.TilDato, SUM(tm.KmPris*s.AntKm) AS "Totalt Beløp"
FROM ansatt AS a, reise AS r, strekning AS s, transportmiddel AS tm
WHERE a.ANr = r.ANr 
AND tm.TNr = s.TNr 
AND r.RNr = s.RNr 
AND a.Leder = 2

$sql = "SELECT Reise.RNr, Fornavn, Etternavn, Beskrivelse, FraDato, TilDato, SUM(AntKm*KMPris) AS Totalt
  FROM Ansatt, Reise, Strekning, Transportmiddel
  WHERE Ansatt.ANr = Reise.ANr
  AND Reise.RNr = Strekning.RNr
  AND Strekning.TNr = Transportmiddel.TNr
  AND Ansatt.Leder = $leder
  AND NOT Godkjent
  GROUP BY Reise.RNr, Fornavn, Etternavn, Beskrivelse, FraDato, TilDato";

$resultat = mysqli_query($db, $sql);
$rad = mysqli_fetch_assoc($resultat);

echo "<table width=\"1\"><tr><th>RNr</th><th>Fornavn</th><th>Etternavn</th><th>Beskrivelse</th>
  <th>Fra dato</th><th>Til dato</th><th>Totalt</th></tr>";
while ($rad) {
  $rnr = $rad['RNr'];
  $fornavn = $rad['Fornavn'];
  $etternavn = $rad['Etternavn'];
  $beskrivelse = $rad['Beskrivelse'];
  $fraDato = $rad['FraDato'];
  $tilDato = $rad['TilDato'];
  $totalt = $rad['Totalt'];

  echo "<tr><td>$rnr</td><td>$fornavn</td><td>$etternavn</td><td>$beskrivelse</td>
    <td>$fraDato</td><td>$tilDato</td><td>$totalt</td></tr>";
  $rad = mysqli_fetch_assoc($resultat);
}
echo "</table>";

lukk($db);
bunn();

?>
