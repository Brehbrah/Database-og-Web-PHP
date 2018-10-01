<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Untitled</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="author" href="humans.txt">
		<script src="script.js"></script>
	</head>
	<body>
		<h1>PHP og JavaScript</h1>
		<h2>Lag et PHP-skript som viser en MySQL-tabell som en HTML-tabell, der brukeren kan skjule hele tabellen ved å klikke på den.</h2>
		
		<button onclick="showHide('tabell')">Show/Hide</button>
		<div id ="tabell" style="display:none">
			<?php
			include "function.php";
			showTable();
			?>
		</div>
		
		
	</body>
</html>