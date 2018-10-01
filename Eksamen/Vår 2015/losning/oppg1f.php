<?php
include_once "hjelpere.php";

if (isset($_GET['sok'])) {
  $sok = $_GET['sok'];
  
  $db = kobleOpp();

  $sql = "SELECT * FROM presentasjon WHERE tittel LIKE '%$sok%'";
  $resultat = mysqli_query($db, $sql);
  $rad = mysqli_fetch_assoc($resultat);

  if ($rad) {
  	echo "<ul>";
  }

  while ($rad) {
    $tittel = $rad['tittel'];
    echo "<li>$tittel</li>";
    $rad = mysqli_fetch_assoc($resultat);
  }

  if ($rad) {
  	echo "</ul>";
  }

  lukk($db);
}
else {
  echo "<p>Ingen presentasjoner matcher søket.</p>";
}
?>