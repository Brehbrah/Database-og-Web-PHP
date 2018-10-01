<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
<title>Databaser og web</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>

<h1>Oppgave 1d (lagring)</h1>

<?php
$tjener = 'localhost';
$bruker = 'root';
$pass = '';
$db = 'politi';

print('<pre>');
print_r($_SESSION);
print('</pre>');

if (isset($_SESSION['unr'])) {
  $unr = $_SESSION['unr'];
  $personer = $_SESSION['personer'];
  $link = mysqli_connect($tjener, $bruker, $pass, $db);
  mysqli_set_charset($link, 'utf8');
  mysqli_autocommit($link, false);
  foreach ($personer as $rad) {
    $id = $rad['id'];
    $rolle = $rad['rolle'];
    $regnr = 'NULL';
    if (!empty($rad['regnr']))
      $regnr = "'" . $rad['regnr'] . "'";
    $sql = "INSERT INTO `person_i_ulykke` (`unr`, `id`, `rolle`, `regnr`) " .
           "VALUES($unr, $id, '$rolle', $regnr)";
    $ok = mysqli_query($link, $sql);
    if (!$ok)
      print("<p>SQL - $sql - feilet!</p>");
  }
  mysqli_commit($link);
  mysqli_close($link);
}
else {
  print("<p>Ulykke må registreres!</p>");
}
?>

</body>
</html>

