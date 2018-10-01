<!DOCTYPE html>
<html>
<head>
<title>Databaser og web</title>
<meta charset="UTF-8" />
</head>
<body>
<h1>Demo table</h1>

<?php

// FileZilla => itfag.usn.no/~161757/uke2/demo.php
// URL: itfag.usn.no/~161757/uke2/demo.php?maks=7

// echo '<a href="filnavn.html">link</a>';

// c:\xampp\htdocs\uke2\demo.php
// localhost/uke2/table.php?min=3&maks=5

$maks = $_GET['maks'];
$min = $_GET['min'];

echo '<pre>';
print_r ($_GET);
echo '</pre>';


echo "<table border=1>";

	echo "<tr>";
	echo "<th>&nbsp</th>";
	for	($h=$min; $h<=$maks; $h++) {
		echo '<th>' . $h . '</th>';
	}
	
	echo "</tr>";

for ($x=$min; $x<=$maks; $x++) {
	echo '<tr>';
	echo "<th>$x</th>";
	for	($y=$min; $y<=$maks; $y++) {
		echo '<td>' . $x*$y . '</td>';
	}
	echo '</tr>';
}
echo "</table>";

?>

</body>
</html>