<?php 

include_once "database.php";
include_once "hjelpefunksjon.php";

$connect = kobleOpp();
toppHTML();

$sql = "SELECT * FROM Kategori ";
$resultat = mysqli_query($connect, $sql);
$rad = mysqli_fetch_assoc($resultat);

h1("Oppgave 1d - Genererer HTML-skjemaet med PHP Skript");
?>

    	<form action="oppg1b.php" method="POST" accept-charset="utf-8" style="text-align: left;">
    		
    		<table border ="0">
    			<tr>
    				<th>Brukernavn</th>
    				<td><input type="text" name="brukernavn" placeholder="Din E-Post"></td>
    			</tr>
    			<tr>
    				<th>Beskrivelse</th>
    				<td><input type="text" name="beskrivelse" placeholder="Vare Beskrivelse"></td>
    			</tr>
    			<tr>
    				<th>Kat.Type</th>
    				<td>
    					<select name="katnr">
    						<?php
    							while ($rad) {
    								$katnr = $rad['KatNr'];
    								$navn = $rad['Navn'];

    								echo "<option value='$katnr'>" . $navn ."</option>";
    								$rad = mysqli_fetch_assoc($resultat);
    							}
    						?>	

    					</select>
    				</td>
    			</tr>
    			<tr>
    				<th>Pris</th>
    				<td><input type="text" name="pris" placeholder="Mellom 20 og 2000 KR."></td>
    			</tr>
    		</table>
    		<p>
    			<button type="submit">submit</button>
    			<button type="reset">Rensk Skjema</button>
    		</p>
    	</form>


<?php
bunnHTML();
lukk($connect);
?>