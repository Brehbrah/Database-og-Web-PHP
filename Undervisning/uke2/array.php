<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $min = $_GET['min'];
        $maks = $_GET['maks'];

        echo "<table border=1>";

        // Table header
        echo "<tr>";
        echo "<th>&nbsp</th>";
        for ($h = $min; $h <= $maks; $h++) {
            echo '<th>' . $h . '</th>';
        }
        echo "</tr>";

        // Table rows and collumns
        for ($x = $min; $x <= $maks; $x++) {
            echo '<tr>';
            echo "<th>$x</th>";
            for ($y = $min; $y <= $maks; $y++) {
                echo '<td>' . $x * $y . '   </td>';
            }
            echo '</tr>';
        }

        echo "</table>";

        /*
          $tab = array(array(1, 2, 3, 4, 5, 6),
          array(2, 4, 6, 8, 10, 12));
         */
        ?>
    </body>
</html>
