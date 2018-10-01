


<?php

function topp () {
echo 
'<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        
        <script src="js/main.js"></script>';

}

function bunn () {
	echo '
    </body>
</html>';

}

function skriv_tabell ($tab) {

	echo '<table border="5">'; 
	echo '<tr>
		<th>Varekode</th>
		<th>Betegnelse</th>
		<th>PrisPrEnhet</th>
	</tr>';
	
	foreach ($tab as $rad) {
		echo "<tr>";
		echo "<td>" . $rad["Varekode"]  . "</td>";
		echo "<td>" . $rad["Betegnelse"]  . "</td>";
		echo "<td>" . $rad["PrisPrEnhet"]  . "</td>";	
	}
	echo "</tr>";
	echo '</table>';
}

?>