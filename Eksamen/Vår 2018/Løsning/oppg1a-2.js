function sjekkSkjema() {
	var hullNr = document.getElementById('hull').value;
	var positivTall = document.getElementById('positiv').value;

	var feilMld = "";


	if (hullNr < 0 || hullNr >= 18) {
		feilMld += document.getElementById('melding').innerHTML = "<p>Ugyldig! MÅ være mellom 1-18!</p>";
	}

	if(0 < positivTall) {
		feil += document.getElementById('melding').innerHTML = "<p>Kan ikke være mindre enn 0</p>";
	}
}

document.getElementById('regSkjema').addEventListener("submit", function(e) {
	if(!sjekkSkjema()) {
		e.preventDefault();
	}
});