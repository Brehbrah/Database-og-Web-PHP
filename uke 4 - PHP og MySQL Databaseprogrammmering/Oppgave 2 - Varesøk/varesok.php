<?php
include "hjelpefunksjoner.php";
include "database.php";

$connect = kobleOpp();
topp();

$vareSøk = $_REQUEST['txtSok'];

visVarer($connect,$vareSøk);



bunn();
kobleNed($connect);
?>
