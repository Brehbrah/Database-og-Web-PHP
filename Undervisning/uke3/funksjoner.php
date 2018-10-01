<?php
function h1($tekst) {
	echo "<h1>$tekst</h1>";
}

function visTabell($tab) {
foreach ($tab as $rad) {

foreach ($rad as $key => $value) {
		echo "<p> $key: $value</p>";
		}
	echo "<br>";
	}
}




function topp() {
	?>
	<!DOCTYPE html>
<html>
<head>
	<title>Nettbutikk</title>
	<link rel="stylesheet" >
</head>
<body>


</body>
</html>
<?php
}


?>