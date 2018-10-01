<?php

// Ikke noe krav om å lage slike hjelpefunksjoner.

// Etablerer forbindelse til databasen
function kobleOpp() {
  $tjener =  "localhost";
  $bruker =  "root";
  $passord = ""; 
  $db = "eksamen";
  $dblink = mysqli_connect($tjener, $bruker, $passord, $db);

  if (!$dblink) {
    die('Klarte ikke å koble til databasen: ' . mysql_error($dblink));
  }

  mysqli_set_charset($dblink, 'utf8');
  return $dblink;
}

// Lukker forbindelsen til databasen
function lukk($dblink) {
  mysqli_close($dblink);
}

function topp() {
 echo "
<!DOCTYPE html>
<html>
<head>
<meta charset=\"UTF-8\" />
</head>
<body>
  ";
}

function bunn() {
  echo "
</body>
</html>
  ";
}

function antallRader($dblink, $sql) {
  $resultat = mysqli_query($dblink, $sql);
  return mysqli_num_rows($resultat);
}

?>
