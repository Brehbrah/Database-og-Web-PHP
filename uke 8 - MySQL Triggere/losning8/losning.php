<!DOCTYPE html>
<html>
<head>
<title>Databaser og web</title>
<link rel="stylesheet" type="text/css" href="css/standard.css" />
<meta charset="UTF-8" />
</head>
<body>

<?php

// URL-parameter:    ?txtVnr=10830

// Endre brukernavn/passord/database
$link = mysqli_connect("localhost", "root", "", "butikk");
mysqli_set_charset($link, 'utf8');

$vnr = $_GET['txtVnr'];

$sql = "UPDATE vare " .
       "SET pris_pr_enhet = pris_pr_enhet * 3 " .
       "WHERE varekode = '$vnr'";
$resultat = mysqli_query($link, $sql);

if (mysqli_errno($link) <> 0) {
  printf("Feil %d %s: %s",
    mysqli_errno($link), mysqli_sqlstate($link), mysqli_error($link));
}
else {
  print("Prisen er oppdatert!");
}

mysqli_close($link);
?>

</body>
</html>