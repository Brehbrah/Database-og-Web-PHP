<!DOCTYPE html>
<html>
<head>
<title>Databaser og web</title>
<meta charset="UTF-8"/>
</head>
<body>

<h1>Side 4: Skjulte felt</h1>

<?php
if (isset($_GET["txtNavn"])) {
  $navn = $_GET["txtNavn"];
  
  echo "<form action=\"side3.php\" method=\"POST\">
    <input type=\"input\" name=\"farge\" />
    <input type=\"hidden\" name=\"navn\" value=\"$navn\" />
    <input type=\"submit\" name=\"btnSend\" value=\"Send CSS-farge\" />
    </form>";
}
else {
  echo "<p>Send med en GET-parameter txtNavn!</p>";
}
?>

</body>
</html>
