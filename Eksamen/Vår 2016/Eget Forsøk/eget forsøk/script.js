function sjekkSkjema() {
	var beskrivelse = document.getElementById('beskrivelse').value;
	var katnr = document.getElementById('katnr').value;
	var dagspris = document.getElementById('dagspris').value;

	var feilmld = "";

	if (dagspris < 20 || dagspris > 2000) {
		feilmld += "<p>Pris må være mellom 20 til 2000 kr!</p>";
	}

	if (feilmld != "") {
		var melding = document.getElementById('melding');
		melding.innerHTML = feilmld;
		return false;
	} else {
		return true;
	}
}

document.getElementById('regskjema').addEventListener("submit", function (e) {
  if (!sjekkSkjema()) {
    e.preventDefault();
  }
}