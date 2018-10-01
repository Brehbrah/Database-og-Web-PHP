<?php
include_once "hjelpere.php";

function sjekkAtFinnes($db, $table, $pk, $pkVal) {
  $sql = "SELECT * FROM $table WHERE $pk=?";
  $stmt = mysqli_prepare($db, $sql);
  mysqli_stmt_bind_param($stmt, "i", $pkVal);
  mysqli_stmt_execute($stmt);
  $resultat = mysqli_stmt_get_result($stmt);
  return (mysqli_num_rows($resultat)==1);
}

?>
