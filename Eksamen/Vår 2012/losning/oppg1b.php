<!DOCTYPE html>
<html>

<head>
<title>Databaser og web</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>

<h1>Oppgave 1b</h1>

<?php
$tjener = 'localhost';
$bruker = 'root';
$pass = '';
$db = 'politi';

if (empty($_POST['fornavn']) or 
    empty($_POST['etternavn']) or 
    empty($_POST['fodselsdato']) or 
    empty($_POST['kjonn'])) {
  print("<p>Alle felt må fylles ut!</p>");
}
else {
  $fornavn = $_POST['fornavn'];
  $etternavn = $_POST['etternavn'];
  $fodselsdato = $_POST['fodselsdato'];
  $kjonn = $_POST['kjonn'];
  
  if ($kjonn != 'K' and $kjonn != 'M')
    print("<p>Kjønn må være K eller M!</p>");
  else {      
    $link = mysqli_connect($tjener, $bruker, $pass, $db);
    mysqli_set_charset($link, 'utf8');
    $sql = "INSERT INTO `person` (`fornavn`, `etternavn`, `fodselsdato`, `kjonn`) " .
           "VALUES('$fornavn', '$etternavn', '$fodselsdato', '$kjonn')"; 
    mysqli_query($link, $sql);
    mysqli_close($link);
    print("<p>Personen er lagret.</p>");
  }
}
?>

</body>
</html>
