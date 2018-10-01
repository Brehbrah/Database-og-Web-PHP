<?php 

include "database.php";
include "hjelpefunksjoner.php";

$connect = kobleOpp();
toppHTML();
?>

<h1>Oppgave 1: Husk bruker</h1>

<form action="bestille.php" method="POST" accept-charset="utf-8">
	<table border = "0">
		<tr>
			<td>Login:</td>
			<td><input type="text" name="brukernavn" placeholder="E-post" size="20"></td>
		</tr>
		<tr>
			<td>Passord:</td>
			<td><input type="text" name="passord" placeholder="Passord" size="20"></td>
		</tr>
	</table>
	<p>
		<button type="submit">Submit</button>
		<button type="reset">Reset</button>
	</p>
</form>

<?php
bunnHTML();
kobleNed($connect);
 ?>