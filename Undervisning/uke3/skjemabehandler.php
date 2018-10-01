<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 


	// skjema er fylt ut
	echo '<pre>';
	print_r($_POST);
	print_r($_GET);
	print_r($_REQUEST);
	echo '</pre>';

$brukernavn = $_POST['brukernavn'];
$passord = $_POST['passord'];

echo "<p>Velkommen $brukernavn</p>";

?>
<form action="skjemabehandler.php" method="POST"> 
<p>
	<input type="text" placeholder="Brukernavn" name="brukernavn">
	<input type="password" placeholder="Passord" name="passord">
</p>

<p>
	<input type="submit" value="Logg inn" name="knapp">
</p>

<p>
	Pest<input type="checkbox" name="sykdom[]" value="1">
	Kolera<input type="checkbox" name="sykdom[]" value="2">
</p>

</form>


</body>
</html>