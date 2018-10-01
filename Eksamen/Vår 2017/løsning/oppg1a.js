function gyldigDato(datoVerdi) {
	var ptn = /^[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]$/;
	if(!ptn.test(datoVerdi)) {
		return false;
	}
}

function sjekkSkjema() {

	var anr = document.getElementById('anr').value;
	var beskrivelse = document.getElementById('beskrivelse').value;
	var dato = document.getElementById('dato').value;
	var km = document.getElementById('km').value;

	var feilMld = "";
	if(anr == "" || beskrivelse == "" || dato == "" || km == "") {
		feilMld += document.getElementById('melding').innerHTML = "<p>Alle felt må fylles ut!</p>";
	}

	if (!gyldigDato(dato)) {
		feilMld += document.getElementById('melding').innerHTML = "<p>Ulovlig Dato!</p>";
	}

	if(ant >= 0) {
		feilMld += document.getElementById('melding').innerHTML = "<p>Må være positiv Tall!</p>";
	}



}

document.getElementById('regSkjema').addEventListener("submit", function (e) {
  if (!sjekkSkjema()) {
    e.preventDefault();
  }
});