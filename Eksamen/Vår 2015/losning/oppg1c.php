<?php
include_once "hjelpere.php";

topp();
$db = kobleOpp();

echo "<h1>Oppgave 1c</h1>";

if (isset($_GET['dato'])) {

  $dato = $_GET['dato'];

  $sql = "SELECT * FROM presentasjon WHERE dato='$dato' ORDER BY romkode, kl_fra";
  $resultat = mysqli_query($db, $sql);
  $rad = mysqli_fetch_assoc($resultat);

  while ($rad) {
    $romkode = $rad['romkode'];
    $kl_fra = $rad['kl_fra'];
    $kl_til = $rad['kl_til'];
    $tittel = $rad['tittel'];
    $epost = $rad['epost'];

    echo "<h2>$tittel</h2>";
    echo "<p>Rom $romkode fra $kl_fra til $kl_til. Foredragsholder: $epost.</p>";
    $rad = mysqli_fetch_assoc($resultat);
  }
}
else {
  echo '<p>Dato ikke oppgitt.</p>';
}

lukk($db);
bunn();

?>
