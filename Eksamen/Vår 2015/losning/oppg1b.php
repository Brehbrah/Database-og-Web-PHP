<?php
include_once "hjelpere.php";

topp();
$db = kobleOpp();

echo "<h1>Oppgave 1b</h1>";

// Enda bedre å bruke prepared statements
$romkode = mysqli_real_escape_string($db, $_POST['romkode']);
$dato = mysqli_real_escape_string($db, $_POST['dato']);
$kl_fra = mysqli_real_escape_string($db, $_POST['kl_fra']);
$kl_til = mysqli_real_escape_string($db, $_POST['kl_til']);
$epost = mysqli_real_escape_string($db, $_POST['epost']);
$tittel = mysqli_real_escape_string($db, $_POST['tittel']);

$sql = "SELECT * FROM rom WHERE romkode='$romkode'";
$antRom = antallRader($db, $sql);

$sql = "SELECT * FROM person WHERE epost='$epost'";
$antPersoner = antallRader($db, $sql);

// Burde i praksis sjekket at det var ledig,
// men det var ikke en del av oppgaven.

if ($antRom==1 && $antPersoner==1) {
  $sql = "INSERT INTO presentasjon(romkode, dato, kl_fra, kl_til, epost, tittel) VALUES
            ('$romkode', '$dato', '$kl_fra', '$kl_til', '$epost', '$tittel')";

  if (mysqli_query($db, $sql)) {
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
