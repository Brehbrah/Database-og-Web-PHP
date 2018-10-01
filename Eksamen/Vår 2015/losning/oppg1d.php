<?php
include_once "hjelpere.php";

topp();

echo "<h1>Oppgave 1d</h1>";

if (isset($_GET['ant_rom'])) {
  $ant_rom = $_GET['ant_rom'];
  
  $db = kobleOpp();

  $sql = "";
  $bokstav = chr(ord('A') + rand(1, 26));
  for ($i=1; $i<=$ant_rom; $i++) { 
    $romkode = $bokstav . '-' . $i;
    $ant_plasser = rand(5, 300);
    $sql .= "INSERT INTO rom(romkode, ant_plasser) VALUES ('$romkode', '$ant_plasser');";
  }

  $svar = mysqli_multi_query($db, $sql);   
  while (mysqli_more_results($db)) {
    $svar = $svar && mysqli_next_result($db);
  }

  if ($svar) {
    echo "<p>$ant_rom rom ble lagt til.</p>";
  }
  else {
    echo '<p>Noe gikk galt</p>';
  }

  lukk($db);
}
else {
  echo '<p>Antall rom ikke oppgitt.</p>';
}

bunn();

?>
