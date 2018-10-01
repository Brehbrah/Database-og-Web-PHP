<!DOCTYPE html>
<html>
<head>
<title>Databaser og web</title>
<meta charset="UTF-8" />
</head>
<body>

<h1>Oppgave 3</h1>

<h2>Vareliste</h2>

<?php
$navneliste = array
(
  "Blomkarse" => 17,
  "Blandet blomsterfrø" => 14
);
$prisBlomkarse = $navneliste['Blomkarse'];
echo "<p>Prisen på Blomkarse er $prisBlomkarse.</p>";

echo "<ul>";
foreach ($navneliste as $navn => $pris) {
	echo "<li>$navn : $pris</li>";
}	
echo "</ul>";
?>


</body>
</html>
