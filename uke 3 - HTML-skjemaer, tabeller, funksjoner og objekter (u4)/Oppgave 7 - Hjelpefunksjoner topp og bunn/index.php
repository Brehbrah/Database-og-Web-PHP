<?php
include_once "hjelpefunksjon.php";
topp();
?>
<h3>Oppgave 5: Nettbutikk versjon 1 Nettbutikken!</h3>

<form action="varesok.php" method="POST<-charset="utf-8">
	<h2>Varesøk</h2>
	<table border ="0">
		<tr>
			<td>Varenavn:</td>
			<td><input type="text" name="varesøk" placeholder="Søk" size="20"></td>
		</tr>
	</table>
	<p>
		<button type="submit">Submit</button>
		<button type="reset">Reset</button>
	</p>
</form>
<form action="login.php" method="POST" accept-charset="utf-8">
	<h2>Innlogging</h2>
	<table border ="0">
		<tr>
			<td>Brukernavn:</td>
			<td><input type="text" name="brukernavn" placeholder="Username" size="20"></td>
		</tr>
		<tr>
			<td>Passord</td>
			<td><input type="text" name="passord" placeholder="Passord" size="20";></td>
		</tr>
	</table>
	<p>
		<button type="submit">Submit</button>
		<button type="reset">Reset</button>
	</p>
</form>
<script src="js/main.js"></script>';
<?php
bunn();
?>