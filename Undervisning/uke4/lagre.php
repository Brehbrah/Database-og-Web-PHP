<?php

include_once 'hjelpefunksjoner.php';
topp();

$hn = "localhost";
$db = "butikk";
$un = "root";
$pw = "";

$conn = new mysqli($hn, $un, $pw, $db);
MYSQLI_SET_CHARSET($conn, "utf8");

if ($conn->connect_error) {
    h1("Feil");
    die($conn->connect_error);
} else {
	
	$varekode = $_POST['txtVare'];
	$pris = $_POST['txtPris'];
	
	// UPDATE Vare SET PrisPrEnhet = 87 WHERE Varekode = '10830';
	$sql = "UPDATE Vare SET PrisPrEnhet = $pris WHERE Varekode = '$varekode'";
	
	// echo "<p>$sql</p>";
	
	$svar = mysqli_query($conn, $sql);
	
	if ($svar) {
		
		h1("Lagret");
	
	}
	
    else {
		h1("Noe gikk galt");
		
		
	}

    
    
}

mysqli_close($conn);

bunn();

?>