<?php

function toppHTML () {
	echo '<!doctype html>
		<html>
		    <head>
		        <meta charset="utf-8">
		        <meta name="description" content="">
		        <meta name="viewport" content="width=device-width, initial-scale=1">
		        <title>Untitled</title>
		        <link rel="stylesheet" href="css/style.css">
		        <link rel="author" href="humans.txt">
		    </head>
    <body>';
}

function bunnHTML() {
	echo '</body>
		</html>';
}

function h1($h1) {
	echo '<h1>' . $h1. '</h1>';
}

?>