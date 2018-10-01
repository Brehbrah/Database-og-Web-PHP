<?php

// Simulerer database med assosiativ tabell
$poststeder = array (
  '3200' => 'SANDEFJORD',
  '3800' => 'BØ',
  '5938' => 'SÆBØVÅGEN',
  '5939' => 'SLETTA',
  '6165' => 'SÆBØ',
  '6571' => 'SMØLA',
  '7619' => 'SKOGN',
  '7551' => 'HOMMELVIK',
  '7560' => 'VIKHAMMER'
);

// Henter parameter fra $_REQUEST for å håndtere både GET og POST.
$inPostnr = $_REQUEST['postnr'];

// Løper gjennom matrisen og finner alle som matcher $inPostnr
// (dvs. alle som starter med $inPostnr).
foreach ($poststeder as $postnr => $poststed) {
  $pos = strpos($postnr, $inPostnr);
  if ($pos!==false) {
    if ($pos == 0)
      print($poststed . ' ');
  }
}
?>
