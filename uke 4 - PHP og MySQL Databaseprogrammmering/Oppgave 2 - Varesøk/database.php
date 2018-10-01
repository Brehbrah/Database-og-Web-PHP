<?php
define("TJENER", "localhost");
define("BRUKERNAVN", "root");
define("PASSORD", "");
define("DB",   "hobbyhuset");

function kobleOpp() {
  $connect = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);
  if (!$connect) {
    echo "<h3>Databasen kan ikke kobles opp!</h3>";
  }
  mysqli_set_charset($connect, 'utf8');
  return $connect;
}

function kobleNed($connect) {
  mysqli_close($connect);
}

function søkeStreng ($connect, $søkeVare) {
  $sql = "SELECT * FROM Vare " . 
         "WHERE Betegnelse LIKE '%" . $søkeVare . "%' ";
         return mysqli_query($connect, $sql);
}

function gyldigBruker($connect, $brukernavn, $passord) {
  $sql = "SELECT * FROM Bruker " .
         "WHERE Epost = '$brukernavn' AND " .
         "Passord = '$passord';";
  $resultat = mysqli_query($connect, $sql);
  $antall = mysqli_num_rows($resultat);
  return ($antall == 1);
}

?>
