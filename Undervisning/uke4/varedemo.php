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
    h1("Noen varer");

    $søk = $_POST['txtSok'];
    echo "<p>Du søkte etter: $søk";
    
    // SELECT * FROM Vare WHERE Betegnelse LIKE 'Du%'
    
    $sql = "SELECT * FROM Vare WHERE Betegnelse LIKE '$søk%'" ;
    echo "<p>$sql</p>";
    
    $svar = $conn->query($sql);

    $rad = mysqli_fetch_assoc($svar);
    while ($rad) {
        // behandle rader

        $betegnelse = $rad['Betegnelse'];
        $pris = $rad['PrisPrEnhet'];
        echo "<p>$betegnelse: kr <b>$pris</b>";

        $rad = mysqli_fetch_assoc($svar);
    }
}



bunn();

