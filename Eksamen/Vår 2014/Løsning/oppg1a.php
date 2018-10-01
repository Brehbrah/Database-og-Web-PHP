<?php 

include_once "hjelpefunksjoner.php";

$connect = kobleOpp();
toppHTML();

echo "<h1>Oppgave 1 - Test-deg-selv</h1>";
	
	// Viser tittel vinduet
	// ---------------------------
	$sql = "SELECT title
			FROM test ";

	$resultat = mysqli_query($connect, $sql);
	$rad = mysqli_fetch_assoc($resultat);

	while($rad) {
		$tittel = $rad['title'];

		echo "<h2>$tittel</h2>";
		$rad = mysqli_fetch_assoc($resultat);
	}
	//----------------------------

	// Spørsmål spørringer
	$sql = "SELECT *
			FROM question ";

	$question = mysqli_query($connect, $sql);
	$radQuestion = mysqli_fetch_assoc($question);

	while($radQuestion) {

		$qid = $radQuestion['qid'];
		$qtext = $radQuestion['qtext'];
		echo "<br>";
		echo "$qid: $qtext";		


		// Svar på spørsmål spørringer
		$sql = "SELECT *
				FROM alternative 
				WHERE qid = $qid ";

		$alternative = mysqli_query($connect, $sql);
		$altRad = mysqli_fetch_assoc($alternative);

		while($altRad) {

			$aid = $altRad['aid'];
			$atext = $altRad['atext'];
			echo "<br>";

			echo " &nbsp; &nbsp; <b>$aid</b> <input type='radio' name='$qid' value='$aid'>$atext";

			$altRad = mysqli_fetch_assoc($alternative);
		}
		echo "<br>";
		$radQuestion = mysqli_fetch_assoc($question);
	}

bunnHTML();
lukk($connect);
?>