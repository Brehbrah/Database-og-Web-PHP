<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>

<h1>Side 4</h1>

<?php 

if (!isset($_SESSION['bruker'])) {
	header('Location: side1.php');
	exit;
}

$bruker = $_SESSION['bruker'];
echo "<p>Velkommen $bruker</p>";

$tall = $_SESSION['tall'];
echo "<p>Du skrev $tall</p>";

unset($_SESSION['bruker']);
unset($_SESSION['tall']);

// test....
$bruker = $_SESSION['bruker'];
echo "<p>Velkommen $bruker</p>";

$tall = $_SESSION['tall'];
echo "<p>Du skrev $tall</p>";


 ?>

</body>
</html>
