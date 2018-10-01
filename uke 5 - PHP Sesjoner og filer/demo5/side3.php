<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>

<h1>Side 3</h1>

<?php 

$bruker = $_SESSION['bruker'];
echo "<p>Velkommen $bruker</p>";

$tall = $_POST['tall'];
echo "<p>Du skrev $tall</p>";

$_SESSION['tall'] = $tall;

echo '<p><a href="side4.php">Side 4</a></p>';

 ?>

</body>
</html>
