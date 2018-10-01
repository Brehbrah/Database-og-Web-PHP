<?php 

define("TJENER",  "localhost");
define("BRUKERNAVN",  "root");
define("PASSORD", "");
define("DB",  "hobbyhuset");

function kobleOpp() {
  $connect = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);

  if(!$connect) {
    die ("<h1>Kan ikke kobles til databasen.</h1> " . mysql_errno($connect));
  } 
  mysqli_set_charset($connect, 'utf8');
  return $connect;
}

function kobleNed($connect) {
  mysqli_close($connect);
}

function toppFem($dblink, $n) {
  $sql = "SELECT OL.*,  SUM(OL.Antall*OL.PrisPrEnhet) AS SamletSalg, V.Betegnelse " .
         "FROM Ordrelinje AS OL, Vare AS V " .
         "WHERE OL.Varekode = V.Varekode " .
         "GROUP BY OL.Varekode " .
         "ORDER BY SUM(OL.Antall*OL.PrisPrEnhet) DESC " .
         "LIMIT $n";
  return mysqli_query($dblink, $sql);
}
?>