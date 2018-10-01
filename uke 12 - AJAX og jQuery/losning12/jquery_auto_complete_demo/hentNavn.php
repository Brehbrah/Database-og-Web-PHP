<?php
function treff($navn) {
  $url = 'localhost';
  $bruker = 'root';
  $passord = '';
  $db = 'test';
  
  $dblink=mysqli_connect($url,$bruker,$passord, $db);
  mysqli_set_charset($dblink, 'utf8');
  $sql = "SELECT * FROM bruker WHERE navn LIKE '$navn%'";
  $svar = mysqli_query($dblink, $sql);
  $data='';
  while($rad=mysqli_fetch_assoc($svar)) {
    $data .= $rad['navn'] . ' ';
  }
  mysqli_close($dblink);
  return $data;
}

if (isset($_REQUEST['sendValue'])){
    $value = $_REQUEST['sendValue'];  
}else{
    $value = "";
}

$alle = treff($value);
echo json_encode(array("treff"=>$alle)); 

?>