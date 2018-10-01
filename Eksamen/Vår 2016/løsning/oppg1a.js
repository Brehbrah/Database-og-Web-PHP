
function sjekkSkjema() {
	var epost = document.getElementById('epost').value;
	var beskrivelse = document.getElementById('beskrivelse').value;
	var pris = document.getElementById('dagspris').value;

	var feilMld = "";

	if(epost == "" || beskrivelse == "" || pris == "") {
		feilMld += document.getElementById('melding').innerHTML = "<p>Alle felt må fylles ut!</p>";	}

	if (pris < 20 || pris > 2000) {
		feilMld += document.getElementById('dagspris').innerHTML = "<p>Dagsprisen må være mellom 20 til 2000,-</p>";
	}
}

document.getElementById('regSkjema').addEventListener("submit", function(e) {

	if(sjekkSkjema()) {
		e.preventDefault();
	}

});