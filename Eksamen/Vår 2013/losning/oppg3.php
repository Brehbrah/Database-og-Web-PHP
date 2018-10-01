<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8" />
</head>
<body>

<h1>Potensielle venner</h1>

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

$sql = "SELECT epost 
       FROM venn AS v1, venn AS v2, bruker AS b
	     WHERER v1.bnr2 = v2.bnr1 
       AND v1.bekreftet = 'J' 
       AND v2.bnr2 = b.bnr 
       AND bekreftet = 'N' 
       AND v1.bnr = $bnr";

$conn = koble_opp();
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  $epost = $row['epost'];

  print("<p>$epost</p>");
}

mysqli_close($conn);

?>

</body>
</html>
