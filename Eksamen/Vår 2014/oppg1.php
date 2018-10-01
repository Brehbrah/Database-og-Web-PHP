<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
</head>
<body>

<?php
define("TJENER",  "localhost");
define("BRUKER",  "root");
define("PASSORD", ""); 
define("DB",      "eksamen");

$db = mysqli_connect(TJENER, BRUKER, PASSORD, DB);
if (!$db) {
  die('Database connection error: ' . mysql_error($db));
}
mysqli_set_charset($db, 'utf8');
 
$tid = $_GET['tid'];

echo "<h1>Test $tid</h1>\n";

echo "<form action=\"oppg2.php?tid=$tid\" method=\"POST\">\n";

$sql = "SELECT * FROM question WHERE tid=$tid ORDER BY qid";
$test = mysqli_query($db, $sql);
$question = mysqli_fetch_assoc($test);
while ($question) {
  $qid = $question["qid"];
  $qtext = $question["qtext"];

  echo "<div class=\"question\">\n";
  echo "<p>$qid. $qtext</p>\n";
  
  $sql = "SELECT * FROM alternative WHERE tid=$tid AND qid=$qid ORDER BY aid";
  $answers = mysqli_query($db, $sql);
  $alternative = mysqli_fetch_assoc($answers);
  while ($alternative) {
    $aid = $alternative["aid"];
	  $atext = $alternative["atext"];
	
	  echo "<div class=\"alternative\">\n";
	  echo "<input type=\"radio\" name=\"q$qid\" value=\"$aid\" />\n";
	  echo "<label>$atext</label>\n";
    echo "</div>\n";

    $alternative = mysqli_fetch_assoc($answers);
  }
  $question = mysqli_fetch_assoc($test);
  
  echo "</div>\n\n";
}

echo "<p><input id=\"submit\" type=\"submit\" value=\"Send svar!\"></p>";
echo "</form>";

mysqli_close($db);
?>

</body>
</html>
