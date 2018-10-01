function sjekkSkjema() {

  var anr = document.getElementById('anr').value;
  var beskrivelse = document.getElementById('beskrivelse').value;
  var dato = document.getElementById('dato').value;
  var tnr = document.getElementById('tnr').value;
	var antkm = document.getElementById('antkm').value;

  var feilmld = "";
  
  // Sjekk på at et felt er fylt ut kan gjøres som følger,
  // eller ved å sette feltet som required i HTML-skjemaet.
  if (anr == "" || beskrivelse == "" || dato == "" || tnr == "" || antkm == "") {
    feilmld += "<p>Alle felt må fylles ut!</p>";
  }

  if (isNaN(Date.parse(dato))) {
    feilmld += "<p>Ulovlig dato!</p>";
  }

  var ant = Math.floor(Number(antkm));
  if (String(ant) != antkm || ant <= 0) {
    feilmld += "<p>Antall kilometer må være et positivt heltall!</p>";
  }

  if (feilmld != "") {
    var melding = document.getElementById('melding');
	  melding.innerHTML = feilmld;
	  return false;
  }
  else {  
    return true;
  }
}

document.getElementById('regskjema').addEventListener("submit", function (e) {
  if (!sjekkSkjema()) {
    e.preventDefault();
  }
});
