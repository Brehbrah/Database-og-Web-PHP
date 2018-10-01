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

<h1>Side 7: Sesjonsvariabler</h1>

<?php
if (isset($_GET["txtNavn"])) {
  $navn = $_GET["txtNavn"];
  $_SESSION['navn'] = $navn;
  print('<p><a href="side8.php">Side 8</a></p>');
}
else {
  echo "<p>Send med en GET-parameter txtNavn!</p>";
}
?>

</body>
</html>
