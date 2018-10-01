<!DOCTYPE HTML>
<html>
<head>
	<title>Demo</title>
</head>
<body>

<h1>Demo Uke 6</h1>

<?php

$k1 = md5('Dette er en ganske lang tekst');
$k2 = md5('Dette er en gankke lang tekst');


echo "<p>$k1</p>";
echo "<p>$k2</p>";

$passord = 'hemmelig';
$k = password_hash($passord, PASSWORD_DEFAULT);

$inntastet = 'hemmelig'; // ok 

// databaseoppslag basert på brukernavn
if (password_verify($inntastet, $k)) {
	
	echo "<p>OK</p>";
	
} else {
	
	echo "<p>IKKE OK</p>";
	
}

$inndata = "en <b>tekst</b> med litt 
	<script>alert('Hei');</script>";
	
	
	$vasket = htmlentities($inndata);
	
	// $inndata blir lagret i database....
	// og hentet ut igjen for enste bruker ...
	
	
	
	
	echo "<p><pre>$vasket</pre></p>";

// demo.php?bruker=Per' -- '&passord=hvasomhelst

$bruker = $_GET['bruker'];  // Per' -- '
$passord = $_GET['passord'];  // hvasomhelst
	
$sql = "SELECT * FROM bruker"
		. "WHERE Brukernavn = '$bruker' "
		. "AND Passord = '$passord'";
		
$conn = new mysqli("localhost", "root", "", "test");
mysqli_set_charset($conn, "utf8");
$vasketSql = mysqli_real_escape_string($conn, $sql);

		
echo "<p><pre>$vasketSql</pre></p>";
	
$m = '#[A-Z][A-Z] [0-9][0-9][0-9][0-9][0-9]#';
if (preg_match($m, 'LY 12345')) {
		echo "<p>MATCH</p>";
} else {
		echo "<p>NO MATCH</p>";
	
}	
	
?>


</body>
</html>