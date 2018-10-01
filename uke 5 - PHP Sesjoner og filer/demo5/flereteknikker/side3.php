<!DOCTYPE html>
<html>
<head>
<title>Databaser og web</title>
<meta charset="UTF-8"/>
</head>
<body>

<h1>Side 3: Vis tilstand</h1>

<?php

if (isset($_REQUEST["navn"]) &&
    isset($_REQUEST["farge"])) {
    
  $navn = $_REQUEST["navn"];
  $farge = $_REQUEST["farge"];
  
  print('<p style="color:' . $farge . '">' .
        $navn . '</p>');
}

?>

</body>
</html>
