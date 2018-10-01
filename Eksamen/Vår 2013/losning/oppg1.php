<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8" />
</head>
<body>

<h1>Meldinger</h1>

<?php
function koble_opp() {
  $tjener =     "localhost";
  $brukernavn = "root";
  $passord =    "";
  $db =         "eksamen";
 
  $conn = mysqli_connect($tjener, $brukernavn, $passord, $db);
  mysqli_set_charset($conn, 'utf8');
  return $conn; 
}


$bnr = $_REQUEST['bnr'];

$sql = "SELECT epost, dato, tittel, tekst " .
       "FROM bruker, melding " .
	     "WHERE bruker.bnr = melding.bnr " .
	     "AND bruker.bnr = $bnr";

$conn = koble_opp();
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  $epost = $row['epost'];
  $dato = $row['dato'];
  $tittel = $row['tittel'];
  $tekst = $row['tekst'];
  
  print("<div class=\"melding\">");
  print("<h2>$tittel</h2>");
  print("<p><a href=\"mailto:$epost\">$epost</a></p>");
  print("<p><b>$dato.</b> $tekst</p>");
  print("</div><hr/>");
}

mysqli_close($conn);

?>

</body>
</html>
