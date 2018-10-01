<?php
include_once "database.php";
include_once "hjelpefunksjon.php";
$connect = kobleOpp();
toppHTML();
$sql = "SELECT * FROM Kategori";
$resultat = mysqli_query($connect, $sql);
$rad = mysqli_fetch_assoc($resultat);
echo "<h1>Oppgave 1d</h1>";
?>
<form action="oppg1b.php" method="POST" accept-charset="utf-8">

	<table border ="0" style="text-align: left;">
		<tr>
			<th>Brukernavn:</th>
			<td><input type="text" name="brukernavn" placeholder="Epost Address" size="20" required></td>
		</tr>
		<tr>
			<th>Beskrivelse: </th>
			<td><input type="text" name="beskrivelse" placeholder="Produkt Beskrivelse" size="30"></td>
		</tr>
		<tr>
			<th>Kategori</th>
			<td>
				<select name="katnr" id="katnr" >
				<?php

				while($rad) {
					$katnr = $rad['KatNr'];
					$navn = $rad['Navn'];
					echo "<option value='$katnr'>$navn</option>";

					$rad = mysqli_fetch_assoc($resultat);
				}
				?>
			</select>
		</td>
		</tr>
		<tr>
			<th>Dagspris: </th>
			<td>
				<input type="text" name="dagspris" id ="dagspris" placeholder="Pris mellom 20 - 2000 kr." size="30">
			</td>
		</tr>
	</table>

	<p>
	 	<button type="submit">Send Forespørsel</button>
	 	<button type="reset">Rensk Skjema</button>
	</p>
</form>


<?php
lukk($connect);
bunnHTML();
?>