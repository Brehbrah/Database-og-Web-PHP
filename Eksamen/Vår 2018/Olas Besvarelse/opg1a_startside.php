<?php //KandidatNUMMER 22


$dblink = mysqli_connect("localhost", "root", "", "test");

if (!$dblink) {
	die("Ikke kblet til basen");
}
mysqli_set_charset($dblink, 'utf8');

 ?>


<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function sjekkDato(){
			var dato = document.getElementById("date").value;
			alert(dato);
			if (!isNaN(Date.parse(dato))){
				preventDefault();
			}
		}
		

	</script>
	<meta charset="utf-8">
	<title>Golf-Registrering</title>
</head>
<body>
	<h1>Starte ny golfrunde</h1>
	<form action="opg1a_regslag.php" id="skjema" method="post" onsubmit="sjekkDato()">
		Golfbane<select name="baneSelect">

		<?php 
		$sqlSpørring = "SELECT * FROM bane as b";
		$resultat = mysqli_query($dblink, $sqlSpørring);
		$teller = 1;
		foreach ($resultat as $rad) {
			$bane = $rad["Navn"];
			echo "<option name='bane' value='$teller'>$bane</option>";
			$teller++;
			}
		 ?>

		 </select>
		Dato<input type="text" name="dato" id="date" required="true" placeholder="Dato ÅÅÅÅ-MM-DD">
		<br><br>Spillere:
		<input type="number" name="spiller1" min="1" placeholder="Spillernummer1">
		<input type="number" name="spiller2" min="1" placeholder="Spillernummer2">
		<input type="number" name="spiller3" min="1" placeholder="Spillernummer3">
		<input type="numbre" name="spiller4" min="1" placeholder="Spillernummer4">
		<br><br> <input type="submit" name="submit" id="regskjema" value="Ny golfrunde">
		

	</form>



</body>
</html>