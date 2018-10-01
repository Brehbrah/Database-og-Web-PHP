<?php
include_once "hjelpefunksjoner.php";
include_once "database.php";

topp();
$dblink = kobleOpp();

$varenavn = $_REQUEST['txtSok'];
h1('Resultat av varesøk: ' . $varenavn);
visVarer($dblink, $varenavn);

lukk($dblink);
bunn();
?>
