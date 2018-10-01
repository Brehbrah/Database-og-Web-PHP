<!DOCTYPE html>
<html>
<head>
    <title>
        
    </title>
</head>
<body>

<h1>Vis bilder</h1>

<?php

echo "<pre>";
print_r($_FILES);
echo "</pre>";

$tmp = $_FILES['filnavn']['tmp_name'];
$filnavn = 'img/' . $_FILES['filnavn']['name'];
copy($tmp, $filnavn);

$katRef = opendir('img/');

$bilde = readdir($katRef);
$bilde = readdir($katRef);

$bilde = readdir($katRef);
echo "<p>
        <a href='img/$bilde'>
           <img src='img/$bilde' height='100' />
        </a>
      </p>";

$bilde = readdir($katRef);
echo "<p><img src='img/$bilde' height='100' /></p>";

?>

</body>
</html>
