function gyldigDatio(dato) {
	var ptn = /^[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]^$/;
	if(!ptn.test(dato)) {
		return false;
	}
}

function klMellom (verdi, fra, til) {
	return fra <= verdi && verdi <= til;
}

function gyldigTid() {
	var ptn = /^[0-24][0-60]:[0-9][0-9]$/;
}

function sjekkSkjema() {

	var dato = document.getElementById('dato').value;
	var klFra = document.getElementById('kl_fra').value;
	var klTil = document.getElementById('kl_til').value;

	var feilMld = "";

	if (dato == "" || klFra == "" || klTil = "") {
		feilMld = document.getElementById('melding').innerHTML = "<p>Alle felt må fylles ut!</p>";
	}

	if (!gyldigDato(dato)) {
		feilMld += document.getElementById('melding').innerHTML = "<p>Ugyldig Dato! Må være ÅÅÅÅ-MM-DD</p>";
	}

	if (!klMellom(klFra) || !klMellom(klTil)) {
		feilMld += document.getElementById('melding').innerHTML = "<p>Formatet må være TT:MM</p>";
	}

}


document.getElementById("regskjema").addEventListener("submit", function(e) {
	if(!sjekkSkjema()) {
		e.preventDefault();
	}
});