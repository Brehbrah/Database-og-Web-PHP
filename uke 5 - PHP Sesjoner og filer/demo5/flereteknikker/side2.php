<!DOCTYPE html>
<html>
<head>
<title>Databaser og web</title>
<meta charset="UTF-8"/>
</head>
<body>

<h1>Side 2: URL-parametre</h1>

<?php

if (!empty($_GET["txtNavn"])) {

  $navn = $_GET["txtNavn"];
  
  print('<p><a href="side3.php?navn=' . $navn .
        '&farge=red">Side 3 rød</a></p>');
  print('<p><a href="side3.php?navn=' . $navn .
        '&farge=blue">Side 3 blå</a></p>');
}

?>

</body>
</html>
