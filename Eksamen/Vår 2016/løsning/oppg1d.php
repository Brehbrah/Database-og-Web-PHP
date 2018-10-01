<?php
include_once "hjelpefunksjoner.php";
$connect = kobleOpp();
toppHTML();
	
	function viseKategori () {
		$connect = kobleOpp();
		$sql = "SELECT * FROM kategori";
		$resultat = mysqli_query($connect, $sql);
		$rad = mysqli_fetch_assoc($resultat);
		echo'<select name="katnr"';
						
				while($rad) {
					// Generer Nedtrekk Liste
					$katNr = $rad['KatNr'];
					$navn = $rad['Navn'];
					echo "<option value=$katNr>" . $navn ."</option>";
					$rad = mysqli_fetch_assoc($resultat);
				}
		echo '</select>';
		lukk($connect);
	}
?>
<h1>Oppgave 1d </h1>
<form action="oppg1b.php" id="regSkjema" method="POST" accept-charset="utf-8" style="text-align:left;">
	<table border="0">
		<tr>
			<th>EierEpost: </th>
			<td><input type="text" id="epost" name="epost" placeholder="Angi Leier Epost"></td>
		</tr>
		<tr>
			<th>Beskrivelse: </th>
			<td><input type="text" id="beskrivelse" name="beskrivelse" placeholder="Angi Leie Beskrivelse"></td>
		</tr>
		<tr>
			<th>Kategori: </th>
			<td>
				<?php viseKategori() ?>
			</td>
		</tr>
		<tr>
			<th>Dagspris: </th>
			<td><input type="text" id="dagspris" name="dagspris" placeholder="Angi beløp 20 - 2000,-"></td>
		</tr>
	</table>
	<div class="melding"></div>
	<p>
		<button type="submit" id="submit">Send Forespørsel</button>
		<button type="reset">Rensk Skjema</button>
	</p>
</form>
<?php
bunnHTML();
lukk($connect);
?>