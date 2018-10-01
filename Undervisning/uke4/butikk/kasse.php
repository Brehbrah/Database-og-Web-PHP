<?php
include "hjelpefunksjoner.php";
include "database.php";

topp();

$vnr = $_REQUEST['txtVnr'];
$antall = $_REQUEST['txtAntall'];

echo "<h1>Kasse</h1>";

if (!array_key_exists($vnr, $navn)) {
  echo "<p>Varenr $vnr finnes ikke</p>";
}
else {
  if ($antall < 1)
    echo "<p>Antall har ugyldig verdi.</p>";
  else {
    $betegnelse = $navn[$vnr];
    $pris = $priser[$vnr];

    $total = $pris*$antall;
    $pris_txt = number_format($pris, 2, ',', ' ');
	  $total_txt = number_format($total,2,',',' ');
	
    echo "<p>Varen er i bestilling.</p>
      <ul>
        <li>Varenr: $vnr </li>
        <li>Betegnelse: $betegnelse </li>
        <li>Varepris: $pris_txt </li>
        <li>Antall enheter: $antall </li>
        <li>Totalpris: $total_txt </li>
      </ul>";
  }
}

bunn();
?>
