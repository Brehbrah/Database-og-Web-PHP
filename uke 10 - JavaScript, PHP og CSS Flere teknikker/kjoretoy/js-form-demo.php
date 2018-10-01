<!DOCTYPE html>
<html>
<head>
<title>Databaser og web</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="js-form-demo.css" />
<script src="js-form-demo.js"></script>
</head>

<body>

<h1>Registrer kjøretøy</h1>

<?php
function lesParameter($param) {
  $verdi = "";
  if (isset($_POST[$param]))
    $verdi = htmlentities(stripslashes($_POST[$param]));
  return $verdi;
}

function lovligRegNr($verdi) {
  return preg_match("/^[A-Z][A-Z][A-Z][A-Z][A-Z][0-9][0-9]$/", $verdi);
}

function lovligHeltall($verdi) {
  return is_numeric($verdi);
}

function mellom($verdi, $fra, $til) {
  return ($verdi >= $fra && $verdi <= $til);
}

$regnr   = lesParameter("regnr");
$merke = lesParameter("merke");
$modell = lesParameter("modell");
$aar   = lesParameter("aar");

$feilmld = "";
  
if ($regnr=="" || $aar=="")
  $feilmld .= "Du må fylle ut samtlige felt!";  
else {
  if (!lovligRegNr($regnr))
    $feilmld .= "<p>RegNr ($regnr) må ha 5 bokstaver og så 2 sifre!</p>";
 
  if (lovligHeltall($aar)) {
    if (!mellom($aar, 1950, 2050))
      $feilmld .= "<p>Årstall ($aar) må være mellom 1950 og 2050!</p>";
  }
  else
    $feilmld .= "<p>Årstall ($aar) må være et heltall!</p>";
}

if ($feilmld == "") {
  echo "<p>Suksess - kjør SQL: INSERT INTO bil(regnr, merke, modell, aar) 
  VALUES ('$regnr', '$merke', '$modell', $aar)</p>";
}
else {
  echo "<p>Feil: $feilmld</p>";
  echo "<p><a href=\"js-form-demo.html\">Gå til forsiden</a></p>";
  // Kan eventuelt slå sammen skjema og PHP-skript.
}
?>
</body>
</html>
