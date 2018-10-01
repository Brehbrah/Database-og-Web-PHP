<?php
include_once "hjelpefunksjoner.php";
include_once "database.php";

topp();
$dblink = kobleOpp();

// NB! Prepared statements er en bedre løsning enn mysqli_real_escape_string
$varenavn = mysqli_real_escape_string($dblink, $_REQUEST['txtSok']);

h1('Resultat av varesøk: ' . $varenavn);
visVarer($dblink, $varenavn);
echo "<a href=\"index.php\">Gå til forsiden</a>.</p>";

lukk($dblink);
bunn();
?>
