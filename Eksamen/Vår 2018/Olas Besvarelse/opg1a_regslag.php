<?php //KandidatNUMMER 22 
session_start();



$dblink = mysqli_connect("localhost", "root", "", "test");

if (!$dblink) {
	die("Ikke kblet til basen");
}
mysqli_set_charset($dblink, 'utf8');

if (!isset($_SESSION["spiller1"])) {
	if (!isset($_SESSION["spiller1"])) {
	$_SESSION["spiller1"] = $_POST["spiller1"];
	}if (!isset($_SESSION["spiller2"])) {
		$_SESSION["spiller2"] = $_POST["spiller2"];
	}if (!isset($_SESSION["spiller3"])) {
		$_SESSION["spiller3"] = $_POST["spiller3"];
	}if (!isset($_SESSION["spiller4"])) {
		$_SESSION["spiller4"] = $_POST["spiller4"];
	}
	if (!isset($_SESSION["baneNr"])) {
		$_SESSION["baneNr"] = $_POST["baneSelect"];
	}
	if (!isset($_SESSION["dato"])) {
		$_SESSION["dato"] = $_POST["dato"];
	}

	$spillere = array();

	if (isset($_POST["spiller1"])) {
		$spillere[] = $_POST["spiller1"];
	}
	if ($_POST["spiller2"]!="") {
		$spillere[] = $_POST["spiller2"];
	}
	if ($_POST["spiller3"]!="") {
		$spillere[] = $_POST["spiller3"];
	}
	if ($_POST["spiller4"]!="") {
		$spillere[] = $_POST["spiller4"];
	}


	$baneNr = $_POST["baneSelect"];
	$dato = $_POST["dato"];

	$sqlSpørring = "INSERT INTO `runde`(`BaneNr`, `Dato`) VALUES (?, ?)";
	$stmt = mysqli_prepare($dblink, $sqlSpørring);
	mysqli_stmt_bind_param($stmt, 'is', $baneNr, $dato);
	mysqli_stmt_execute($stmt);

	$resultat = mysqli_stmt_get_result($stmt);
	$getLastID = "SELECT LAST_INSERT_ID()";
	$svar = mysqli_query($dblink, $getLastID);
	$svar2 = mysqli_fetch_assoc($svar);
	$rundeNr = $svar2["LAST_INSERT_ID()"];
	$_SESSION["rundeNr"]=$rundeNr;

	$getRundeNavn = "SELECT b.Navn from bane as b where b.BaneNr = $baneNr";
	$navnSvar = mysqli_query($dblink, $getRundeNavn);
	$navnSvar2 = mysqli_fetch_assoc($navnSvar);
	$baneNavn = $navnSvar2["Navn"];
	$_SESSION["baneNavn"] = $baneNavn;

	 ?>


	<!DOCTYPE html>
	<html>
	<head>
		<script type="text/javascript">
			
		</script>
		<meta charset="utf-8">
		<title>Golf-Slag-Registrering</title>
	</head>
	<body>
		<h1>Registrere antall slag</h1>
		<?php 
		echo "<p>Runde $rundeNr på $baneNavn golfbane den $dato</p>";
		echo "<form action='opg1a_regslag.php' id='slagForm' method='post'>";
		echo "Hull: <input type='number' required='true' name='hull' placeholder='Hullnummer 1-18' min='1' max='18'><br>";
		
		$i = 0;
		foreach ($spillere as $rad) {
			$getSpillerNavn = "SELECT CONCAT(s.Fornavn, ' ', s.Etternavn) as Navn from spiller as s where s.SpillerNr = $rad";
			$navnSvar = mysqli_query($dblink, $getSpillerNavn);
			$navnSvar2 = mysqli_fetch_assoc($navnSvar);
			$spillerNavn = $navnSvar2["Navn"];
			$antallSlag = "antallSlag" . $i;
			$i++;
			echo "Spiller $rad - $spillerNavn:    ";
			echo "<input type='number' name='$antallSlag' placeholder='Hullnummer 1-18' min='1'><br>";
		}


		?>
		<input type="submit" name="submit" value="Registrer resultat">
		</form>


	</body>
	</html>
	<?php  
}
else{
	$spillere = array();
	if (isset($_SESSION["spiller1"])) {
		$spiller = $_SESSION["spiller1"];
		$rundeNr = $_SESSION["rundeNr"];
		$hullNr = $_POST["hull"];
		$antallSlag = $_POST["antallSlag0"];
		$setSlag = "INSERT INTO `resultat`(`SpillerNr`, `RundeNr`, `HullNr`, `AntallSlag`) 
					VALUES ($spiller, $rundeNr, $hullNr, $antallSlag)";
		$resultat = mysqli_query($dblink, $setSlag);
		if (mysqli_affected_rows($dblink)<=0) {
			$error = mysqli_error($dblink);
			echo "Noe feil skjedde: Error: $error";
		}
		$spillere[] = $_SESSION["spiller1"];
	}if ($_SESSION["spiller2"]=!"") {
		$spiller = $_SESSION["spiller2"];
		$rundeNr = $_SESSION["rundeNr"];
		$hullNr = $_POST["hull"];
		$antallSlag = $_POST["antallSlag1"];
		$setSlag = "INSERT INTO `resultat`(`SpillerNr`, `RundeNr`, `HullNr`, `AntallSlag`) VALUES ($spiller, $rundeNr, $hullNr, $antallSlag)";
		$resultat = mysqli_query($dblink, $setSlag);
		if (mysqli_affected_rows($dblink)<=0) {
			$error = mysqli_error($dblink);
			echo "Noe feil skjedde: Error: $error";
		}
		$spillere[] = $_SESSION["spiller2"];
	}if ($_SESSION["spiller3"]=!"") {
		$spiller = $_SESSION["spiller3"];
		$rundeNr = $_SESSION["rundeNr"];
		$hullNr = $_POST["hull"];
		$antallSlag = $_POST["antallSlag2"];
		$setSlag = "INSERT INTO `resultat`(`SpillerNr`, `RundeNr`, `HullNr`, `AntallSlag`) VALUES ($spiller, $rundeNr, $hullNr, $antallSlag)";
		$resultat = mysqli_query($dblink, $setSlag);
		if (mysqli_affected_rows($dblink)<=0) {
			$error = mysqli_error($dblink);
			echo "Noe feil skjedde: Error: $error";
		}
		$spillere[] = $_SESSION["spiller3"];
	}if ($_SESSION["spiller4"]=!"") {
		$spiller = $_SESSION["spiller4"];
		$rundeNr = $_SESSION["rundeNr"];
		$hullNr = $_POST["hull"];
		$antallSlag = $_POST["antallSlag3"];
		$setSlag = "INSERT INTO `resultat`(`SpillerNr`, `RundeNr`, `HullNr`, `AntallSlag`) VALUES ($spiller, $rundeNr, $hullNr, $antallSlag)";
		$resultat = mysqli_query($dblink, $setSlag);
		if (mysqli_affected_rows($dblink)<=0) {
			$error = mysqli_error($dblink);
			echo "Noe feil skjedde: Error: $error";
		}
		$spillere[] = $_SESSION["spiller4"];

	}
}
$baneNavn = $_SESSION["baneNavn"];
$dato = $_SESSION["dato"];


?>

<!DOCTYPE html>
	<html>
	<head>
		<script type="text/javascript">
			
		</script>
		<meta charset="utf-8">
		<title>Golf-Slag-Registrering</title>
	</head>
	<body>
		<h1>Registrere antall slag</h1>
		<?php 
		echo "<p>Runde $rundeNr på $baneNavn golfbane den $dato</p>";
		echo "<form action='opg1a_regslag.php' id='slagForm' method='post'>";
		echo "Hull: <input type='number' required='true' name='hull' placeholder='Hullnummer 1-18' min='1' max='18'><br>";
		
		$i = 0;
		foreach ($spillere as $rad) {
			$getSpillerNavn = "SELECT CONCAT(s.Fornavn, ' ', s.Etternavn) as Navn from spiller as s where s.SpillerNr = $rad";
			$navnSvar = mysqli_query($dblink, $getSpillerNavn);
			$navnSvar2 = mysqli_fetch_assoc($navnSvar);
			$spillerNavn = $navnSvar2["Navn"];
			$antallSlag = "antallSlag" . $i;
			$i++;
			echo "Spiller $rad - $spillerNavn:    ";
			echo "<input type='number' name='$antallSlag' placeholder='Hullnummer 1-18' min='1'><br>";
		}


		?>
		<input type="submit" name="submit" value="Registrer resultat">
		</form>


	</body>
	</html>









