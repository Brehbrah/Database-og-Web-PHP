<!DOCTYPE html>
<header>
</header>
<body>

<?php

$tjener = "localhost";
$bruker = "root";
$pass = "";
$db = "butikk";

$link = mysqli_connect($tjener, $bruker, $pass, $db);
mysqli_set_charset($link, 'utf8');

$sql = "UPDATE vare SET PrisPrEnhet = PrisPrEnhet + 1000";
$resultat = mysqli_query($link, $sql);


echo "<p>" . mysqli_errno($link) . "</p>";
echo "<p>" . mysqli_sqlstate($link) . "</p>";
echo "<p>" . mysqli_error($link) . "</p>";

mysqli_close($link);
?>


</body>