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

<h1>Oppgave 1d (registrering)</h1>

<?php
if (!isset($_SESSION['unr']) && isset($_POST['sendKnapp'])) {
  $_SESSION['unr'] = $_POST['unr'];
  $_SESSION['personer'] = array();
}

if (isset($_POST['sendKnapp'])) {
  $id = $_POST['id'];
  $rolle = $_POST['rolle'];
  $regnr = $_POST['regnr'];
  $rad = array('id'=>$id, 'rolle'=>$rolle, 'regnr'=>$regnr);

  $personer = $_SESSION['personer'];
  $personer[] = $rad;
  $_SESSION['personer'] = $personer;
}
?>

<form method="POST" action="oppg1d2.php">
<table border="0" width="50%">
<tr>
  <td>Ulykke (unr):</td>

<?php  
if (isset($_SESSION['unr']))
  print('<td><input type="text" name="unr" size="20" value="' . $_SESSION['unr'] . '"></td>');
else
  print('<td><input type="text" name="unr" size="20"></td>');
?>

</tr>
<tr>
  <td>Person (id):</td>
  <td><input type="text" name="id" size="10"></td>
</tr>
<tr>
  <td>Rolle:</td>
  <td><input type="text" name="rolle" size="20"></td>
</tr>
<tr>
  <td>RegNr:</td>
  <td><input type="text" name="regnr" size="10"></td>
</tr>
</table>
<p>
  <input type="submit" value="Registrer" name="sendKnapp">
  <input type="reset" value="Rensk skjema" name="renskKnapp">
</p>
</form>

<p><a href="oppg1d2.php">Lagre persondata</a></p>

</body>
</html>
