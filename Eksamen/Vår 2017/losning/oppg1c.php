<?php
include_once "hjelpere.php";
include_once "oppg1b.php";

topp();
$db = kobleOpp();

echo "<h1>Oppgave 1c</h1>";

// Avleser skjemadata
$anr = $_POST['anr'];
$beskrivelse = $_POST['beskrivelse'];
$dato = $_POST['dato'];
$tnr = $_POST['tnr'];
$antkm = $_POST['antkm'];

// Sjekker at ansatt finnes
if (!sjekkAtFinnes($db, "Ansatt", "ANr", $anr)) {
  $melding = "Ukjent ansatt $anr.";
}

// Sjekker at transportmiddel finnes
else if (!sjekkAtFinnes($db, "Transportmiddel", "TNr", $tnr)) {
  $melding = "Ukjent transportmiddel $tnr.";
}

else {

  // Setter inn rad i Reise
  $sql = "INSERT INTO Reise(Beskrivelse, FraDato, TilDato, Anr, Godkjent) "
       . "VALUES(?, ?, ?, ?, FALSE)";
  $stmt = mysqli_prepare($db, $sql);
  mysqli_stmt_bind_param($stmt, "sssi", $beskrivelse, $dato, $dato, $anr);

  if (!mysqli_stmt_execute($stmt)) {
    $feil = mysqli_error($db);
    $melding = "<p>Feil oppsto ved lagring av reise: $feil</p>";
  }

  // Setter inn rad i Strekning
  else {
    $rnr= mysqli_insert_id($db); // Henter siste reisenummer
    $sql = "INSERT INTO Strekning(RNr, SNr, TNr, AntKm) "
         . "VALUES(?, 1, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $rnr, $tnr, $antkm);

    if (mysqli_stmt_execute($stmt)) {
      $melding = "<p>Reise $rnr ble lagret korrekt.</p>";
    }

    else {
      $feil = mysqli_error($db);
      $melding = "<p>Feil oppsto ved lagring av reisestrekning: $feil</p>";
    }    
  }
}

echo($melding);

lukk($db);
bunn();

?>
