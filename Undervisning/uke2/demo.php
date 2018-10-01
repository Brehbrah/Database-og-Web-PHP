<!DOCTYPE html>
<html>
<head>
<title>Databaser og web</title>
<meta charset="UTF-8" />
</head>
<body>
<h1>Demo</h1>

<?php

// FileZilla => itfag.usn.no/~161757/uke2/demo.php
// URL: itfag.usn.no/~161757/uke2/demo.php?maks=7

// echo '<a href="filnavn.html">link</a>';

// c:\xampp\htdocs\uke2\demo.php
// localhost/uke2/demo.php?min=3&maks=5

$maks = $_GET['maks'];
$min = $_GET['min'];
echo '<table border="1">';

for ($x=$min; $x<=$maks; $x++) {
	echo '<tr>';
	for	($x=$min; $x<=$maks; $x++) {
		$svar = $x*$y;
		echo "<td>$svar</td>";
	}
	echo '</tr>';
}
echo '</table>';
////////////////////////////

$fil = 'demo.php';

echo "<a href=\"$fil\">link</a>";

for ($i=1; $i<=$maks; $i++) {
	
	echo "<li>$i</li>";	
}
echo '<ul>';

?>

</body>
</html>