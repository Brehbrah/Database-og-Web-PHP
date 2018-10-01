<!DOCTYPE html>
<html>

<head>
<title>Databaser og web</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>

<h1>Oppgave 1c</h1>

<?php
$tjener = 'localhost';
$bruker = 'root';
$pass = '';
$db = 'politi';

$link = mysqli_connect($tjener, $bruker, $pass, $db);
mysqli_set_charset($link, 'utf8');
$sql =  "SELECT kjoretoy.merke, COUNT(*) AS antall " .
        "FROM ulykke, person_i_ulykke, kjoretoy " .
        "WHERE ulykke.unr = person_i_ulykke.unr " .
        "AND person_i_ulykke.regnr = kjoretoy.regnr " .
        "AND YEAR(dato) = 2010 " .
        "GROUP BY kjoretoy.merke";
$resultat = mysqli_query($link, $sql);
print('<table border="1">');
$rad = mysqli_fetch_assoc($resultat);

print("<tr>");
foreach ($rad as $kol => $verdi) {
  print("<th>$kol</th>");
}
print("</tr>");
  
while ($rad) {
  print("<tr>");
  foreach ($rad as $kol => $verdi) {
    print("<td>$verdi</td>");
  }
  print("</tr>");
  $rad = mysqli_fetch_assoc($resultat);
}
print('</ul>');

mysqli_free_result($resultat);
mysqli_close($link);
?>

</body>
</html>
