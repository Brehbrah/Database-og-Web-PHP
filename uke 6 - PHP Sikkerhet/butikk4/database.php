<?php

// Lagrer oppkoblingsparametre til databasen utenfor web-treet.
// (Roten i web-treet for lokal XAMPP er c:\xampp\htdocs.)
include_once "c:\\xampp\\includes\\globals.php";

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

// Sjekker brukernavn/passord
function gyldigBruker($dblink, $brukernavn, $passord) {
  $ok = false;
  $_SESSION['innlogget'] = false;
  $sql = "SELECT * FROM Bruker WHERE Epost = '$brukernavn'";
  $resultat = mysqli_query($dblink, $sql);
  $antall = mysqli_num_rows($resultat);
  if ($antall == 1) {
    $rad = mysqli_fetch_assoc($resultat);
    $pwd = $_POST["passord"];
    $kryptert = $rad['Passord'];
  
    // I nyere versjoner av PHP kan man i stedet bruke password_hash for
    // å kryptere og password_verify for å sjekke.
    
  //if (password_verify($pwd, $kryptert)) {
     if (crypt($passord, $kryptert)) {
      $ok = true;
      $_SESSION['bnr'] = $rad['BNr'];
      $_SESSION['brukernavn'] = $rad['Epost'];
      $_SESSION['fornavn'] = $rad['Fornavn'];
      $_SESSION['etternavn'] = $rad['Etternavn'];
      $_SESSION['kurv'] = array();
    }
  }
  return $ok;
}

// Sjekker om bruker er logget inn,
// og redirigerer til innloggingsside hvis ikke.
function sjekkInnlogging() {
  if (!isset($_SESSION['bnr'])) {
    session_destroy();
    header("Location: index.php");
  }
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
  $varerad = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
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

// Sett inn rad i tabell med autonummerert primærnøkkel,
// og returner primærnøkkelverdien.
function settInn($dblink, $sql) {
  $ok = mysqli_query($dblink, $sql);
  if (!$ok)
    die('<p>Feil i SQL: ' . $sql . ' - ' . mysqli_error($dblink) . '</p>');
  return mysqli_insert_id($dblink);
}

// Utfør SQL-spørring og returner første rad.
function hentForsteRad($dblink, $sql) { 
  $resultat = mysqli_query($dblink, $sql);
  if (!$resultat)
    die('<p>Feil i SQL: ' . $sql . ' - ' . mysqli_error($dblink) . '</p>');
  $rad = mysqli_fetch_assoc($resultat);
  return $rad;
}

?>
