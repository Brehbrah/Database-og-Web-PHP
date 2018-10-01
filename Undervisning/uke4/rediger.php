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
    h1("Rediger i vare");
	$varekode = $_GET['kode'];
	$pris = $_GET['pris'];
	
	echo "<p>Rediger vare $varekode</p>";
    
echo <<<EOT
<form method="POST" action="lagre.php">
<p>Varenavn: <input type="text" name="txtVare" value="$varekode" size="20"></p>
<p>Pris: <input type="text" name="txtPris" Value="$pris" size="20"></p>
<p>
  <input type="submit" value="Oppdater" name="sendKnapp">
  <input type="reset" value="Rensk skjema" name="renskKnapp">
</p>
</form>
EOT;
	
	
	
	
	
	
}

mysqli_close($conn);

bunn();

?>