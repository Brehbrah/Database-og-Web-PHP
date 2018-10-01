function mellom(verdi, fra, til) {
  return fra<=verdi && verdi<=til;
}

function gyldigDato(verdi) {
  var ptn = /^[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]$/;
  if ( !ptn.test(verdi) ) {
    return false;
  }
  
  var aar = Number(verdi.substring(0, 4));
  var mnd = Number(verdi.substring(5, 7));
  var dag = Number(verdi.substring(8, 10));
  
  // dager[i] = antall dager i måned nr. i (bruker ikke indeks 0).
  // Det var ikke krav om å sjekke for skuddår, så antar 28 dager i februar.
  var dager = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
  
  return mellom(mnd, 1, 12) && mellom(dag, 1, dager[mnd]);
}

function gyldigKlSlett(verdi) {
  var ptn = /^([0-9]|[1][0-9]|2[0-3]):([0-9]|[1-5][0-9])$/;
  return ptn.test(verdi);
}

function sjekkSkjema() {
  var dato = document.getElementById('dato').value;
  var klFra = document.getElementById('kl_fra').value;
  var klTil = document.getElementById('kl_til').value;
	
  var feilmld = "";
  
  if (!gyldigDato(dato))
    feilmld += "<p>Dato må være en lovlig dato på formen: ÅÅÅÅ-MM-DD</p>";
    
	if (!gyldigKlSlett(klFra) || !gyldigKlSlett(klTil))
    feilmld += "<p>Klokkeslett må være et lovlig klokkeslett på formen: TT:MM</p>";
  
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
