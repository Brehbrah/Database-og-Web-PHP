<?php
include "hjelpefunksjoner.php";
include "database.php";

topp();

$varenavn = $_REQUEST['txtSok'];
$varenr = null;

foreach ($navn as $vnr => $betegnelse) {
  if ($varenavn == $betegnelse) {
    $varenr = $vnr;
    break;
  }
}

h1('Resultat av varesøk');

if ($varenr == null) {
  print('<p>Varen "' . $varenavn . '" finnes ikke</p>');
}
else {
  $pris = $priser[$varenr];
  print('<p>' . $varenavn . ' har varenr ' . $varenr .
        ' og koster kr. ' . number_format($pris, 2, ',', ' ')  .
        '.</p>');
}

bunn();
?>
