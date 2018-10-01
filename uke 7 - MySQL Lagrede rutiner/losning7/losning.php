<!DOCTYPE html>
<html>
<head>
<title>Databaser og web</title>
<link rel="stylesheet" type="text/css" href="css/standard.css" />
<meta charset="UTF-8" />
</head>
<body>

<h1>Leksjon 7</h1>

<?php

// Leksjon 07. Lagrede rutiner
// Oppgave 7 = PHP-testing av oppg 1 - 6

// Kjør SQL-skript først - oppretter tabellen vare.

function koble_opp() {
  // Tilpass disse:
  define("TJENER",  "localhost");
  define("BRUKERNAVN",  "root");
  define("PASSORD", "");
  define("DB",  "hobbyhuset");

  $dblink = mysqli_connect(TJENER, BRUKERNAVN, PASSORD, DB);
  mysqli_set_charset($dblink, 'utf8');
  
  return $dblink;
}

function lukk($dblink) {
  mysqli_close($dblink);
}

function sjekk($dblink) {
  if (mysqli_errno($dblink) <> 0) {
    printf("Feil %d %s: %s",
           mysqli_errno($dblink),
           mysqli_sqlstate($dblink),
           mysqli_error($dblink));
  }
}

function testOppg1($dblink) {
  $vnr = '10830';
  $sql = "SELECT hent_varenavn('$vnr') varenavn";
  $resultat = mysqli_query($dblink, $sql);
  $rad = mysqli_fetch_assoc($resultat);
  $navn = $rad['varenavn'];
  print("<p><b>Oppg 1</b> Varenavn: $navn</p>");
}

function testOppg2($dblink) {
  $vnr = '10830';
  $sql = "CALL hent_vare('$vnr', @vnavn, @pris, @ant)";
  $resultat = mysqli_query($dblink, $sql);
  $sql = "SELECT @vnavn varenavn, @pris pris, @ant antall";
  $resultat = mysqli_query($dblink, $sql);
  $rad = mysqli_fetch_assoc($resultat);
  $navn = $rad['varenavn'];
  $pris = $rad['pris'];
  $antall = $rad['antall'];
  print("<p><b>Oppg 2</b> Varenavn=$navn " .
        "pris=$pris antall=$antall</p>");
}

function testOppg3($dblink) {
  $sql = "CALL ny_vare('1', 'XYZ', 20.50, 3)";
  $resultat = mysqli_query($dblink, $sql);
  $rad = mysqli_fetch_assoc($resultat);
  $kvittering = $rad['  '];
  print("<p><b>Oppg 3</b> $kvittering</p>");
}

function testOppg4($dblink) {
  $sql = "CALL slett_vare('1', @kvittering)";
  mysqli_query($dblink, $sql);
  $sql = "SELECT @kvittering";
  $resultat = mysqli_query($dblink, $sql);
  $rad = mysqli_fetch_assoc($resultat);
  $kvittering = $rad['@kvittering'];
  print("<p><b>Oppg 4</b> $kvittering</p>");
}

function testOppg5($dblink) {
  $sql = "CALL endre_varepris('10820', 23.50, @kvittering)";
  mysqli_query($dblink, $sql);
  $sql = "SELECT @kvittering";
  $resultat = mysqli_query($dblink, $sql);
  $rad = mysqli_fetch_assoc($resultat);
  $kvittering = $rad['@kvittering'];
  print("<p><b>Oppg 5</b> $kvittering</p>");
}

function testOppg6($dblink) {
  $sql = "CALL ny_vare_v2('1', 'XYZ', 20.50, 3, @kode, @melding)";
  mysqli_query($dblink, $sql);
  $sql = "SELECT @kode, @melding";
  $resultat = mysqli_query($dblink, $sql);
  $rad = mysqli_fetch_assoc($resultat);
  $kode = $rad['@kode'];
  $melding = $rad['@melding'];
  print("<p><b>Oppg 6</b> Statuskode $kode : $melding</p>");
}


// ===================================================


print("<h1>Leksjon 7. Lagrede rutiner</h1>");

$dblink = koble_opp();

// testOppg1($dblink);

//testOppg2($dblink);
//testOppg3($dblink);
//testOppg4($dblink);
//testOppg5($dblink);
testOppg6($dblink);

lukk($dblink); 

?>

</body>
</html>
