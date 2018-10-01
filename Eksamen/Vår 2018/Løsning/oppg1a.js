function gyldigDato(datoVerdi) {
	var ptn = /^[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]$/;
	if(!ptn.test(datoVerdi)) {
		return false;
	}
}

function sjekkSkjema() {
	var dato = document.getElementById('dato').value;
	var spiller = document.getElementById('spiller').value;

	var feilMld = "";
	
	if(spiller == "" || dato == "" ) {
		feilMld += document.getElementById('melding').innerHTML = "<p>Alle felt må fylles ut!</p>";
	}

	if(gyldigDato(dato)) {
		feilMld += document.getElementById('melding').innerHTML = "<p>Dato må være YYYY-MM-DD</p>";
	}

	if (spiller > 0) {
		feilMld += document.getElementById('melding').innerHTML = "<p>Spiller må være positiv tall</p>";
	}

	
}

document.getElementById('regSkjema').addEventListener("submit", function (e) {
  if (!sjekkSkjema()) {
    e.preventDefault();
  }
});