<!DOCTYPE html>
<html>
<head>
<title>Databaser og web</title>
<link rel="stylesheet" type="text/css" href="css/standard.css" />
<meta charset="UTF-8" />
</head>
<body>

<?php

// Prosedyre som returnerer spørreresultat (repetisjon)

// Blir kun dumpet på skjermen.


/*
-- Må kjøres i MySQL først

DELIMITER $$

DROP PROCEDURE IF EXISTS hent_varer $$

CREATE PROCEDURE hent_varer()
BEGIN
  SELECT * FROM vare;
END $$

DELIMITER ;
*/

$tjener =     "localhost";
$brukernavn = "root";
$passord =    "";
$db =         "butikk";

$dblink = mysqli_connect($tjener, $brukernavn, $passord, $db);
mysqli_set_charset($dblink, 'utf8');
  
$sql = "CALL hent_varer()";
$resultat = mysqli_query($dblink, $sql);
$rad = mysqli_fetch_assoc($resultat);
while ($rad) {
  print_r($rad);
  print('<br/>');
  $rad = mysqli_fetch_assoc($resultat);
} 
mysqli_close($dblink);
  
?>

</body>
</html>
