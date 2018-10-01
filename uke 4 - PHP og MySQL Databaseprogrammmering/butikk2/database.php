<?php

// Oppkoblingsparametre til databasen defineres som konstanter.
// Må endres ved bruk på f.eks. db-kurs.hit.no.


// Oppkoblingsparametre (konstanter)
define("TJENER",  "localhost");
define("BRUKER",  "root");
define("PASSORD", ""); 
define("DB",      "hobbyhuset");

// Etablerer forbindelse til databasen
function kobleOpp() {
  $dblink = mysqli_connect(TJENER, BRUKER, PASSORD, DB);
  if (!$dblink) {
    die('Klarte ikke å koble til databasen: ' . mysql_error($dblink));
  }
  mysqli_set_charset($dblink, 'utf8');
  return $dblink;
}

// Lukker forbindelsen til databasen
function lukk($dblink) {
  mysqli_close($dblink);
}

// Sjekker om bruker finnes (antar forbindelse til databasen)
function gyldigBruker($dblink, $brukernavn, $passord) {
  $sql = "SELECT * FROM Bruker " .
         "WHERE Epost = '$brukernavn' AND " .
         "Passord = '$passord';";
  $resultat = mysqli_query($dblink, $sql);
  $antall = mysqli_num_rows($resultat);
  return ($antall == 1);
  
  // En ikke helt vanntett løsning, men den skal forbedres...
}

// Henter ut varer med navn som inneholder søketeksten
function hentVarer($dblink, $varenavn) {
  $sql = "SELECT * FROM Vare " .
         "WHERE Betegnelse LIKE '%" . $varenavn . "%' " .
         "ORDER BY Betegnelse;";
  return mysqli_query($dblink, $sql);
}

// Henter en vare med gitt varekode
function hentVare($dblink, $varekode) {
  $sql = "SELECT * FROM Vare " .
         "WHERE Varekode='" . $varekode . "';";
  $resultat = mysqli_query($dblink, $sql);
  $varerad = mysqli_fetch_array($resultat, MYSQL_ASSOC);
  return $varerad;
}

// Henter de mest solgte varene
function hentBestselgere($dblink, $n) {
  $sql = "SELECT OL.*,  SUM(OL.Antall*OL.PrisPrEnhet) AS SamletSalg, V.Betegnelse " .
         "FROM Ordrelinje AS OL, Vare AS V " .
         "WHERE OL.Varekode = V.Varekode " .
         "GROUP BY OL.Varekode " .
         "ORDER BY SUM(OL.Antall*OL.PrisPrEnhet) DESC " .
         "LIMIT $n";
  return mysqli_query($dblink, $sql);
}

?>
