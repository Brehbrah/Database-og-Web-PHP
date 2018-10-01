<!DOCTYPE html>
<html>
<head>
<title>Databaser og web</title>
<meta charset="UTF-8"/>
</head>
<body>

<h1>Side 5: Cookies</h1>

<?php
if (isset($_GET["txtNavn"])) {
  $navn = $_GET["txtNavn"];
  setcookie("navn", "$navn", time()+3600);
  print('<p><a href="side6.php">Side 6</a></p>');
}
else {
  echo "<p>Send med en GET-parameter txtNavn!</p>";
}
?>

</body>
</html>
