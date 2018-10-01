<?php
include_once "hjelpere.php";

topp();
$db = kobleOpp();

echo "<h1>Oppgave 1b - med prepared statements</h1>";

$romkode = $_POST['romkode'];
$dato = $_POST['dato'];
$kl_fra = $_POST['kl_fra'];
$kl_til = $_POST['kl_til'];
$epost = $_POST['epost'];
$tittel = $_POST['tittel'];

$sql = "SELECT * FROM rom WHERE romkode=?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "s", $romkode);
mysqli_stmt_execute($stmt);
$resultat = mysqli_stmt_get_result($stmt);
$antRom = mysqli_num_rows($resultat);

$sql = "SELECT * FROM person WHERE epost=?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "s", $epost);
mysqli_stmt_execute($stmt);
$resultat = mysqli_stmt_get_result($stmt);
$antPersoner = mysqli_num_rows($resultat);

// Burde i praksis sjekket at det var ledig,
// men det var ikke en del av oppgaven.

if ($antRom==1 && $antPersoner==1) {
  $sql = "INSERT INTO presentasjon(romkode, dato, kl_fra, kl_til, epost, tittel)
          VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($db, $sql);
  mysqli_stmt_bind_param($stmt, "ssssss", $romkode, $dato, $kl_fra, $kl_fra, $epost, $tittel);
  if (mysqli_stmt_execute($stmt)) {
    $pid = mysqli_insert_id($db);
    echo "<p>Presentasjon med pid=$pid ble lagret korrekt.</p>";
  }
  else {
    $mld = mysqli_error($db);
    echo "<p>Noe gikk galt: $mld</p>";
  }
}
else {
  // Bedre å gi to mer spesifikke feilmeldinger...
  echo "<p>Rom eller foredragsholder finnes ikke!</p>";
}

lukk($db);
bunn();

?>
