<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
  </head>
  <body>
    <h1>Behandling av venneforespørsel</h1>

    <?php
    include_once "hjelpefunksjon.php";

    $bnr1 = $_REQUEST['bnr1'];
    $bnr2 = $_REQUEST['bnr2'];
    $dato = date("Y-m-d");
    $sql = "INSERT INTO venn(bnr1, bnr2, fra_dato, bekreftet) " .
    "VALUES ($bnr1, $bnr2, '$dato', 'N')";

    $conn = kobleOpp();
    $result = mysqli_query($conn, $sql);
    if ($result) {
    $sql = "SELECT COUNT(*) as antall 
            FROM venn WHERE bnr1 = $bnr1 
            AND bekreftet = 'N'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
    $ant = $row['antall'];
    print("<p>Du har nå sendt $ant venneforespørsler som ennå ikke er bekreftet.</p>");
    }
    }
    else {
    $melding = mysqli_error($conn);
    print("<p>$melding</p>");
    }
    lukk($connect);
    ?>
  </body>
</html>