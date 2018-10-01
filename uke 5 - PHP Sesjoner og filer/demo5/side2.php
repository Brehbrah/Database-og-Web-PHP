<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>

<h1>Side 2</h1>

<?php 

$bruker = $_POST['bruker'];
echo "<p>Velkommen $bruker</p>";

$_SESSION['bruker'] = $bruker;

?>

<form action="side3.php" method="POST">
	
	<input type="text" name="tall" />
    <input type="submit" name="knapp" />

</form>

</body>
</html>
