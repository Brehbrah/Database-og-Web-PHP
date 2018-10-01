<?php

include_once "database.php";

$connect = kobleOpp();
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oppgave 7. PHP testskript</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>

    	<h1>Oppgave 7 - PHP testskript</h1>

    	<table border ="1" style="color:#AC5262FF;">
            <tr>
                <th>
                    Lag PHP testskript som kaller opp funksjonene og prosedyrene laget over. 
                    Les eventuelle inndata fra bruker via GET-parametre.
                </th>
            </tr>
        </table>
    		<br>
    	
        <h2>Resultat:</h2>

    	<?php 

        
        oppg1($connect, 90531);
        oppg2($connect, 10820);
        oppg3($connect, '1', 'XYZ', 20.50, 3, TRUE);
        
        // oppg4 prosedyren er ikke helt 100% korrekt, fordi det viser ikke noe frem meldinger 
        // oppg4($connect, '1');

        oppg4Alt($connect, '1');

        oppg5($connect, '10820', '999.99');
       // oppg6('2', 'XYZ', 20.50, 3, TRUE);
    	?>
        
        <script src="js/main.js"></script>
    </body>
</html>

<?php 
lukk($connect);
?>