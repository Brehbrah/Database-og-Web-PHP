<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Databaser og web</title>
<meta charset="UTF-8"/>
</head>
<body>

<h1>Side 8: Sesjonsvariabler</h1>

<?php
  $navn = $_SESSION["navn"];
  print("<h1>Hei $navn !</h1>");
  unset($_SESSION["navn"]);
?>

</body>
</html>
