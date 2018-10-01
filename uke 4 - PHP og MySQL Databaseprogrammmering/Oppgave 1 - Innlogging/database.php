<?php

define("TJENER", "localhost");
define("BRUKERNAVN", "root");
define("PASSORD", "");
define("DB", "hobbyhuset");

function kobleOpp () {
  $connect = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);

  if (!$connect) {
    echo "<h1>Kan ikke kobles til databasen</h1>";
  }
  mysqli_set_charset($connect, 'utf8');
  return $connect;
}

function kobleNed($connect) {
  mysqli_close($connect);
}

function gyldigBruker ($connect, $brukernavn, $passord) {
  $sql = "SELECT Epost, Passord FROM Bruker " .
         "WHERE Epost = '$brukernavn' AND passord = '$passord'";
  $result = mysqli_query($connect, $sql);
  $antall = mysqli_num_rows($result);
  return ($antall == 1); 
}

function gyldigBrukerNavn($connect) {
  $sql = "SELECT Fornavn, Etternavn FROM Bruker " .
         "WHERE fornavn AND etternavn";
  return mysqli_query($connect, $sql);
}

?>